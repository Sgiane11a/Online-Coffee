<x-app-layout>
    {{--Encabezado--}} 
    <section class="relative bg-cover h-50 sm:h-60 md:h-[270px]" style="background-image: url('{{ asset('images/FORO.png') }}');">
        <div class="absolute inset-0"></div> <!-- Filtro oscuro encima del fondo -->
    
        <div class="relative z-10 flex flex-row items-center justify-between px- py-9 max-w-xl mx-auto  ">
            <div class="grid grid-cols-4 items-center">
                    <!-- Espacio vacío a la izquierda -->
                    <div></div>
                    <!-- Contenedor del Título -->
                    <div class="text-center">
                        <h1 class="sm:text-7xl titulo0">Comunidad</h1>
                    </div>
    </section>
    {{--Encabezado --}} 



<div class="container">


{{-- CREAR UNA NUEVA PUBLICACION --}}
<div class="form-container black-box">
    <div class="profile">
        <div class="profile-image">
            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        </div>
        <p class="profile-name">{{ Auth::user()->name }}</p>
    </div>
    <form action="{{ route('forum.post.store') }}" method="POST">
        @csrf
        <label for="title">Título:</label>
        <input type="text" id="title" name="title" class="input-field" required>
        <label for="content">Contenido:</label>
        <textarea id="content" name="content" class="textarea-field" required></textarea>
        <button type="submit" class="btn-submit">Publicar</button>
    </form>
</div>



    {{-- LISTADO DE PUBLICACIONES --}}
    @foreach ($posts as $post)
        <div class="post black-box">
            <div class="post-header profile">
                <img class="profile-image" src="{{ $post->user->profile_photo_url }}" alt="{{ $post->user->name }}" />
                <div class="profile-info">
                    <p class="profile-name">{{ $post->user->name }}</p>
                    <p class="post-time">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="post-body">
                <p class="post-title">{{ $post->title }}</p>
                <p class="post-content">{{ $post->content }}</p>
                @if (Auth::id() == $post->user_id)
                    <div class="post-actions">
                        <a href="{{ route('forum.post.edit', $post->id) }}" class="edit-link">Editar</a>
                    </div>
                @endif
                <div class="reactions">
                    <form action="{{ route('posts.react', $post) }}" method="POST">
                        @csrf
                        <button class="reaction-button" type="submit" name="type" value="like">👍</button>
                        <span class="reaction-count">{{ $post->reactions->where('type', 'like')->count() }}</span>
                        <button class="reaction-button" type="submit" name="type" value="dislike">👎</button>
                        <span class="reaction-count">{{ $post->reactions->where('type', 'dislike')->count() }}</span>
                    </form>
                </div>
                <div class="comment-section">
                    <h3>Comentarios</h3>
                    @foreach ($post->comments()->with('user')->get() as $comment)
                        <div class="comment profile">
                            <img class="profile-image"
                                src="{{ $comment->user ? $comment->user->profile_photo_url : asset('images/default-avatar.png') }}"
                                alt="{{ $comment->user->name ?? 'Usuario anónimo' }}" />
                            <div>
                                <p class="profile-name">{{ $comment->user->name ?? 'Usuario anónimo' }}</p>
                                <p class="comment-text">{{ $comment->content }}</p>
                                <p class="comment-time">{{ $comment->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                    <form class="comment-form" action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <textarea name="content" placeholder="Escribe un comentario..." required></textarea>
                        <button type="submit" class="btn-submit">Comentar</button>
                    </form>
                </div>
            </div>
            
        </div>

        


    @endforeach
</div>




</x-app-layout>







<style>

























/* Contenedor principal */
.post {
    background-color: #ffffff; /* Fondo blanco */
    border: 1px solid #ccc; /* Borde gris claro */
    border-radius: 10px; /* Bordes redondeados */
    padding: 20px; /* Espaciado interno */
    margin: 20px auto; /* Espaciado externo */
    max-width: 600px; /* Ancho máximo */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

/* Cabecera del post */
.post-header {
    display: flex; /* Alinea los elementos horizontalmente */
    align-items: center; /* Alineación vertical centrada */
    gap: 10px; /* Espaciado entre elementos */
    margin-bottom: 15px; /* Espaciado inferior */
}

.profile-image {
    width: 50px; /* Tamaño de la imagen */
    height: 50px; /* Tamaño de la imagen */
    border-radius: 50%; /* Imagen circular */
    object-fit: cover; /* Recorta la imagen adecuadamente */
    border: 1px solid #ccc; /* Borde ligero */
}

.profile-info {
    display: flex;
    flex-direction: column; /* Alineación vertical */
    gap: 2px; /* Espacio entre el nombre y la hora */
}

.profile-name {
    font-size: 16px; /* Tamaño del texto */
    font-weight: bold; /* Negrita */
    color: #333; /* Texto oscuro */
}

.post-time {
    font-size: 12px; /* Tamaño más pequeño */
    color: #777; /* Color gris claro */
}

/* Cuerpo del post */
.post-body {
    margin-top: 10px;
}

.post-title, .post-content {
    font-size: 14px; /* Tamaño del texto */
    color: #555; /* Color gris oscuro */
    margin: 10px 0; /* Espaciado superior e inferior */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #ccc; /* Borde ligero */
    border-radius: 5px; /* Bordes redondeados */
    background-color: #f9f9f9; /* Fondo gris claro */
}

/* Acciones del post */
.post-actions {
    margin-top: 10px;
}

.post-actions .edit-link {
    font-size: 12px;
    color: #6b46c1; /* Morado */
    text-decoration: none; /* Sin subrayado */
}

.post-actions .edit-link:hover {
    text-decoration: underline;
}

/* Reacciones */
.reactions {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
}

.reaction-button {
    background: none; /* Sin fondo */
    border: 1px solid #ccc; /* Borde ligero */
    border-radius: 5px; /* Bordes redondeados */
    padding: 5px 10px; /* Espaciado interno */
    cursor: pointer; /* Cursor de puntero */
    font-size: 16px; /* Tamaño del texto */
    transition: background-color 0.3s ease, color 0.3s ease;
}

.reaction-button:hover {
    background-color: #6b46c1; /* Fondo morado */
    color: #fff; /* Texto blanco */
}

.reaction-count {
    font-size: 14px;
    color: #777; /* Gris claro */
}

/* Sección de comentarios */
.comment-section {
    margin-top: 20px;
    border-top: 1px solid #ccc; /* Línea separadora */
    padding-top: 15px;
}

.comment-section h3 {
    font-size: 14px;
    color: #333;
    margin-bottom: 10px;
}

/* Comentarios individuales */
.comment {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.comment img {
    width: 40px; /* Tamaño más pequeño */
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 1px solid #ccc;
}

.comment .profile-name {
    font-size: 14px;
    font-weight: bold;
}

.comment .comment-text {
    font-size: 12px;
    color: #555;
}

.comment .comment-time {
    font-size: 10px;
    color: #777;
}

/* Formulario de comentarios */
.comment-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.comment-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    resize: none; /* Desactiva el redimensionamiento */
}

.comment-form button {
    align-self: flex-end;
    background-color: #6b46c1; /* Morado */
    color: #fff; /* Texto blanco */
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.comment-form button:hover {
    background-color: #553c9a; /* Morado oscuro */
}

































/* Contenedor principal */
.form-container {
    background-color: #ffffff; /* Fondo blanco */
    border: 1px solid #ccc; /* Borde gris claro */
    border-radius: 10px; /* Bordes redondeados */
    padding: 20px; /* Espaciado interno */
    max-width: 600px; /* Ancho máximo */
    margin: 20px auto; /* Centrado horizontal */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera */
}

/* Perfil del usuario */
.profile {
    display: flex; /* Elementos en línea */
    align-items: center; /* Alineación vertical */
    gap: 10px; /* Espacio entre la imagen y el nombre */
    margin-bottom: 20px; /* Espacio inferior */
}

.profile-image img {
    width: 50px; /* Ancho de la imagen */
    height: 50px; /* Altura de la imagen */
    border-radius: 50%; /* Imagen circular */
    object-fit: cover; /* Recorta la imagen adecuadamente */
    border: 1px solid #ccc; /* Borde gris claro */
}

.profile-name {
    font-size: 16px; /* Tamaño de la fuente */
    font-weight: bold; /* Negrita */
    color: #333; /* Color oscuro */
}

/* Campos del formulario */
label {
    display: block; /* Etiquetas en bloque */
    font-size: 14px; /* Tamaño de fuente */
    color: #333; /* Color del texto */
    margin-bottom: 5px; /* Espacio inferior */
}

.input-field, .textarea-field {
    width: 100%; /* Ocupa todo el ancho */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #ccc; /* Borde gris claro */
    border-radius: 5px; /* Bordes redondeados */
    font-size: 14px; /* Tamaño del texto */
    margin-bottom: 15px; /* Espaciado inferior */
}

.textarea-field {
    height: 80px; /* Altura específica para el textarea */
}

/* Botón de envío */
.btn-submit {
    background-color: #ffffff; /* Fondo blanco */
    color: #333; /* Texto oscuro */
    border: 1px solid #333; /* Borde oscuro */
    border-radius: 5px; /* Bordes redondeados */
    padding: 8px 15px; /* Espaciado interno */
    cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
    font-size: 14px; /* Tamaño de la fuente */
    transition: background-color 0.3s ease, color 0.3s ease; /* Animación de hover */
}

.btn-submit:hover {
    background-color: #333; /* Fondo oscuro */
    color: #ffffff; /* Texto blanco */
}






























































/* stylo*/
.descripcion0 {
    margin-top: 10px;
    color: #000000;
    max-width: 400px; /* Reducir el ancho máximo */
    padding-right: 5px; /* Controla la cantidad de espacio a la derecha */
    padding: 30px;
}



/* Título dentro del encabezado */
.titulo0 {
    position: relative;
    background: #ffffff;
    padding: 25px 50px;
    border-radius: 8px;
    display: inline-block;

    font-weight: bolder;
    color: #B4198B;
    margin-bottom: 100px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
}

.titulo0::before {
    content: '';
    position: absolute;
    top: 10px;
    left: -15px;
    width: 100%;
    height: 100%;
    background: #B4198B;
    z-index: -1;
    border-radius: 8px;
    transform: translate(-5%, 5%);
}

.cate{
    margin-bottom: 10px;
}

</style>