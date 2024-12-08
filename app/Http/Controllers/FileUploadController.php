<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class FileUploadController extends Controller
{
    public function uploadPdf(Request $request)
    {
        // Validar el archivo
        $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:10240', // Máximo 10 MB
        ]);

        try {
            // Subir el archivo a Cloudinary
            $uploadedFileUrl = Cloudinary::uploadFile(
                $request->file('pdf')->getRealPath(),
                [
                    'folder' => 'documentos', // Carpeta en Cloudinary
                    'resource_type' => 'raw', // Específico para archivos no multimedia
                ]
            )->getSecurePath();

            return response()->json([
                'success' => true,
                'url' => $uploadedFileUrl,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al subir el archivo: ' . $e->getMessage(),
            ], 500);
        }
    }
}
