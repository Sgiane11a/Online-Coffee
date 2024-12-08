<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Bookscategory;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
// LISTO (3) IMA Diseño y desarrollo de Software

            $books = [
                [  
                    'category_id' => 1,
                    'title' => 'El lenguaje de programación C#',
                    'author' => 'José Antonio González Seco',
                    'language' => 'es',
                    'publication_year' => 2010,
                    'description' => 'El lenguaje de programación C# de José Antonio González Seco es una guía introductoria al lenguaje de programación C# que abarca temas como Microsoft.NET, características de C#, preprocesador, aspectos léxicos, clases, espacios de nombres, variables y tipos de datos, métodos, propiedades, indizadores, redefinición de operadores, delegados y eventos, estructuras, enumeraciones, interfaces e instrucciones.',
                    'image_public_id' => 'El_lenguaje_de_programación_C_nqym6z',
                    'pdf_file' => '',
                ],
                [
                    'category_id' => 1,
                    'title' => 'Introducción a JavaScript',
                    'author' => 'Javier Eguíluz Pérez',
                    'language' => 'es',
                    'publication_year' => 2009,
                    'description' => 'Introducción a JavaScript por Javier Eguíluz Pérez es una introducción al lenguaje de programación JavaScript, utilizado principalmente para crear páginas web dinámicas. Cubre desde los conceptos básicos hasta temas avanzados como el DOM, eventos y formularios.',
                    'image_public_id' => 'Introducción_a_JavaScript_vfpvc2',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681262/Introducci%C3%B3n_a_JavaScript_Javier_Egu%C3%ADluz_P%C3%A9rez_y61zyf.pdf',
                ],
                [
                    'category_id' => 1,
                    'title' => 'Introducción a la Programación',
                    'author' => 'Garcia, I. & Marzal, A.',
                    'language' => 'es',
                    'publication_year' => 2023,
                    'description' => 'Curso de Matlab por Sergio Giner es un curso de introducción a Matlab, un entorno interactivo de cálculo y visualización vinculado a un lenguaje de programación de alto nivel. El curso abarca temas como diagramación, entorno Matlab, manipulación de matrices, gráficos, programación básica y avanzada, operaciones de entrada y salida, entre otros.',
                    'image_public_id' => 'Introduccion_a_la_Programación_con_Pyton_wxtynq',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681099/24._Introducci%C3%B3n_a_la_Programaci%C3%B3n_con_Python_autor_Andr%C3%A9s_Marzal_e_Isabel_Gracia_v6fnvw.pdf'
                ],
            
// LISTO (2) IMA Administración de Redes y Comunicaciones
                [
                    'category_id' => 2,
                    'title' => 'Comunicación y Redes de Computadoras',
                    'author' => 'Wiliam Stallings',
                    'language' => 'es',
                    'publication_year' => 2001,
                    'description' => 'Este libro intenta dar una visión unificada del amplio campo que abarcan las comunicaciones y redes de computadores. La organización del libro refleja un intento de estructurar este vasto campo en partes comprensibles, y de construir, poco a poco, una visión panorámica de su estado actual. El libro destaca principios básicos y temas de importancia fundamental que conciernen a la tecnología de este área; además, proporciona una discusión detallada de temas de vanguardia.',
                    'image_public_id' => 'Comunicación_y_Redes_de_Computadoras_iawh8o',
                    'pdf_file' => ''

                ],
                [
                    'category_id' => 2,
                    'title' => 'Administración y Gestión de Una Red Local',
                    'author' => 'Anónimo',
                    'language' => 'en',
                    'publication_year' => 2012,
                    'description' => 'Este libro intenta dar una visión unificada del amplio campo que abarcan las comunicaciones y redes de computadores. La organización del libro refleja un intento de estructurar este vasto campo en partes comprensibles, y de construir, poco a poco, una visión panorámica de su estado actual. El libro destaca principios básicos y temas de importancia fundamental que conciernen a la tecnología de este área; además, proporciona una discusión detallada de temas de vanguardia.',
                    'image_public_id' => 'Administración_y_Gestión_de_Una_Red_Local_tfd4xq',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681098/Administracion_y_gestion_de_una_red_de_area_local_hu0gra.pdf'

                ],
            
// LISTO (1) IMA Diseño y Desarrollo de Simuladores y Videojuegos

                [
                    'category_id' => 3,
                    'title' => 'Arquitectura del Motor de Videojuegos',
                    'author' => 'Vallejo, D. & Cleto, M.',
                    'language' => 'es',
                    'publication_year' => 2015,
                    'description' => 'Este libro forma parte de una colección de cuatro volúmenes dedicados al Desarrollo de Videojuegos. Con un perfil principalmente técnico, estos cuatro libros cubren los aspectos esenciales en programación de videojuegos',
                    'image_public_id' => 'Arquitectura_de_Motor_de_Videojuegos_fkjj9j',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681102/Arquitectura_y_Motor_de_Videojuegos_c2qxre.pdf'

                ],
            
// LISTO (1) IMA Modelado y Animación Digital
                
                [
                    'category_id' => 4,
                    'title' => 'Diseño y Modelado 3D',
                    'author' => 'Elías Pérez García',
                    'language' => 'es',
                    'publication_year' => 2020,
                    'description' => 'Crear un personaje 3D (orientado a proyectos de animación). Utilizar elndesarrollo de este proyecto y los problemas que conlleve como un medio para ampliar mis habilidades, tanto de modelado 3D como de diseño de personajes. La pieza que dé como resultado este proyecto servirá para ampliar mi portafolio y contribuirá, por tanto, al desarrollo de mi carrera profesional.',
                    'image_public_id' => 'Diseño_y_Modelado_3D_nqzttu',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681161/Dise%C3%B1o_y_Modelado_3D_de_un_personaje_para_animaci%C3%B3n_j6ftmv.pdf'

                ],
            
// LISTO (1) IMA Big Data y Ciencia de Datos
                [
                    'category_id' => 5,
                    'title' => 'Big Data y Ciencia de Datos',
                    'author' => 'Fernando Cava Valenciano',
                    'language' => 'es',
                    'publication_year' => 2021,
                    'description' => 'Big data, data science, data analytics, transformación digital, son actualmente términos de so común que están relacionadas con la informática, las nuevas tecnologías y el gran volumen de datos que genera nuestra sociedad. Su plicación alcanza a numerosos sectores, entre ellos también la medicina y el laboratorio. ',
                    'image_public_id' => 'Big_Data_y_Ciencia_de_Datos_a4jy3d',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681099/Big_data_y_ciencia_de_datos_pn1gjh.pdf'

                ],
            
// LISTO (1) IMA Diseño Industrial
                [
                    'category_id' => 6,
                    'title' => 'Ingienería Industrial',
                    'author' => 'Niebel, B. & Freivalds',
                    'language' => 'es',
                    'publication_year' => 2009,
                    'description' => 'Los objetivos de la duodécima edición son casi los mismos que los de la anterior: proporcionar un libro de texto universitario práctico y actualizado que describa los métodos ingenieriles para medir, analizar y diseñar el trabajo manual.',
                    'image_public_id' => 'Ingieneria_Industrial_zk64mc',
                    'pdf_file' => ''
                ],
            
// LISTO (1) IMA Producción y Gestión Industrial
                [
                    'category_id' => 7,
                    'title' => 'Planificación y Control de la Producción',
                    'author' => 'Chapnam, Stephen',
                    'language' => 'es',
                    'publication_year' => 2006,
                    'description' => 'En este libro se hace uso del análisis cuantitativo y cualitativo; cuantitativo, porque muchas de sus herramientas y técnicas disponible son cuantitativas y deben considerarse así; y cualitativo, porque los administradores eficaces toman los resultado de los análisis cuantitativos como punto de partida para la toma de decisiones y no como un sustituto.',
                    'image_public_id' => 'Planificación_y_Control_de_la_Producción_rhnurz',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681263/Planificacion_y_control_de_la_producci%C3%B3n_plrnzt.pdf'

                ],
            
// LISTO (1) IMA Operaciones Mineras
                [
                    'category_id' => 8,
                    'title' => 'Términos Geológicos y Mineros',
                    'author' => 'Arizona',
                    'language' => 'es',
                    'publication_year' => 2021,
                    'description' => 'En este libro podemos conocer un poco más a fondo sobre los términos Geológicos y Mineros de las operaciones, facilitando así a nuestros jóvenes mineros un mejor entendimiento acerca de nuestro campo laboral.',
                    'image_public_id' => 'Terminos_Geologicos_y_Mineros_aiolr0',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681266/Terminos_Geologicos_y_Mineros_mhev9u.pdf'

                ],
            

//LISTO (2) Calculo
                [
                    'category_id' => 16,
                    'title' => 'Teoria y Problemas de Calculo Diferencial e Integral',
                    'author' => 'Frank Ayres',
                    'language' => 'es',
                    'publication_year' => 1971,
                    'description' => 'El propósito de este libro sigue siendo, como en la primera edición (en inglés), proporcionar a los
                    alumnos que inician sus estudios de cálculo una serie de problemas representativos, resueltos con tododetalle. Por sus características será asimismo de gran utilidad para los estudiantes de ciencias e ingenieria que necesiten consultar o repasar conceptos fundamentales de la teoria y encontrar el modo de resolver ciertos problemas, relacionados con alguna aplicación práctica. Por otra parte, al figurar en esta edición demostraciones de los teoremas y deducciones de las fórmulas de derivación e integración, junto con una amplia relación de problemas resueltos y propuestos, también se puede utilizar como libro de texto para desarrollar un curso de cálculo.',
                    'image_public_id' => 'Teoria_y_Problemas_de_Calculo_Diferencial_e_Integral_gimyip',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733029715/Teoria_y_Problemas_de_Calculo_Diferencial_e_Integral_gimyip.jpg'

                ],
                [
                    'category_id' => 16,
                    'title' => 'Calculo Diferencial e Integral',
                    'author' => 'Purcell, Varberg & Rigdon',
                    'language' => 'es',
                    'publication_year' => 2007,
                    'description' => 'Para muchos, este libro aún será considerado como un texto tradicional. En su mayoría, se demuestran los teoremas, se dejan como ejercicio o se dejan sin demostrar cuando la comprobación es demasiado difícil. Cuando esto último sucede, tratamos de dar una explicación intuitiva para que el resultado sea plausible, antes de pasar al tema siguiente. En algunos casos, damos un bosquejo de una demostración, en cuyo caso explicamos por qué es un bosquejo y no una demostración rigurosa',
                    'image_public_id' => 'Calculo_Diferencial_e_Integral_wl1y7d',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733097980/Calculo_Diferencial_e_Integral_nn2sug.pdf',

                ],
            
//LISTO (2) IMA Expresion Oral
                [
                    'category_id' => 17,
                    'title' => 'Expresión Oral y Escrita',
                    'author' => 'Gabriel Alvarez Undurraga',

                    'language' => 'es',
                    'publication_year' => 2007,
                    'description' => 'En todas las actividades estudiantiles y laborales, el empleo de la lengua materna pasa a constituirse en un instrumento básico de su profesión. Por otra parte, las normas jurídicas establecen la legalidad del idioma castellano y los criterios de interpretación de la ley, entre los que se señalan el criterio gramatical y el criterio lógico.',
                    'image_public_id' => 'Expresión_Oral_y_Escrita_natjtw',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681259/Expresi%C3%B3n_Oral_y_Escrita_qd1rrd.pdf'

                ],
                [
                    'category_id' => 17,
                    'title' => 'Expresion Oral y Escrita II',
                    'author' => 'Directores y Profesores',

                    'language' => 'es',
                    'publication_year' => 2016,
                    'description' => 'Con mucha frecuencia le atribuimos a la comunicación el éxito o el fracaso de nuestra actuación en los diferentes papeles que asumimos en la vida diaria. El trabajo, los negocios, la sociedad, la política, los amigos, la familia y el estudio son algunos de los aspectos que nos obligan a emitir mensajes orales y escritos. El lenguaje es el instrumento que nos permite comunicarnos con los demás al enviar y recibir mensajes. Podemos decir que existen dos tipos de comunicación: la verbal y la no verbal.',
                    'image_public_id' => 'Expresion_Oral_y_Escrita_II_euicrr',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681258/Expresion_Oral_Escrita_II_w21xvn.pdf'

                ],
            
//LISTO (5) IMA Fisica
                [
                    'category_id' => 18,
                    'title' => 'Física Volumen I',
                    'author' => 'Juan Guillermo Rivera Berrío',

                    'language' => 'es',
                    'publication_year' => 2022,
                    'description' => 'Se ha conservado la propuesta pedagogica en los ejemplos presentados en cada uno de los capítulos, los cuales incluyen: formulación del problema, estrategia de solución, solución, explicacion o sentido de los resultados obtenidos y, en la mayoría de los ejemplos, un problema propuesto, denominado "Comprueba tu aprendizaje". Al final de cada capítulo se han incluido tanto los problemas propuestos como las respuestas.',
                    'image_public_id' => 'Fisica_Volumen_I_sakutl',
                    'pdf_file' => ''

                ],
                [
                    'category_id' => 18,
                    'title' => 'General Physics I',
                    'author' => 'David G. Simpson',

                    'language' => 'en',
                    'publication_year' => 2020,
                    'description' => 'Classical Mechanics, proporciona una introducción a la física general, específicamente enfocada en la mecánica clásica. Cubre temas como unidades de medida, estrategias de resolución de problemas, densidad, cinemática en una dimensión, vectores y el producto escalar, entre otros.',
                    'image_public_id' => 'General_Physics_I_xi0jvm',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681261/General_Physics_I_fupxkg.pdf'

                ],
                [
                    'category_id' => 18,
                    'title' => 'Teoría de la relatividad General',
                    'author' => 'M.C. Escher',

                    'language' => 'es',
                    'publication_year' => 2013,
                    'description' => 'Teoría de la Relatividad General aborda los principios de la relatividad y la física moderna, incluyendo un repaso de la teoría de Maxwell, el principio de la relatividad, la relatividad especial, álgebra de tensores y transformaciones ortogonales.',
                    'image_public_id' => 'Teoría_de_la_relatividad_General_j7qmxk',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681264/Teor%C3%ADa_de_la_Relatividad_General_Bert_Janssen_1_vkj81j.pdf'

                ],
                [
                    'category_id' => 18,
                    'title' => 'An introduction to physics',
                    'author' => 'Dr. Perves Hoodbhoy',

                    'language' => 'en',
                    'publication_year' => 2011,
                    'description' => 'An introduction to physics, es una guía introductoria a la física que cubre una amplia gama de temas, desde la cinemática y las leyes de Newton hasta la física cuántica y nuclear.',
                    'image_public_id' => 'An_introduction_to_physics_cctysj',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681099/34._An_introduction_to_physics_autor_Dr._Pervez_Hoodbhoy_1_mkssvz.pdf'

                ],
                [
                    'category_id' => 18,
                    'title' => 'Apuntes de los temas de Termodinamica',
                    'author' => 'Agustín Martin Domingo',

                    'language' => 'es',
                    'publication_year' => 2015,
                    'description' => 'Apuntes de los temas de Termodinámica es un compendio detallado sobre conceptos esenciales de termodinámica, abordando desde variables termodinámicas hasta procesos cuasiestáticos.',
                'image_public_id' => 'Apuntes_de_los_temas_de_Termodinamica_mpq4is',
                'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681099/Apuntes_de_los_temas_de_Termodin%C3%A1mica_Agust%C3%ADn_Mart%C3%ADn_Domingo_1_an6ilh.pdf'

                ],
            
//LISTO (5) IMA Electricidad
                [
                    'category_id' => 19,
                    'title' => 'Electricidad Básica',
                    'author' => 'Ladislao Saucedo',

                    'language' => 'es',
                    'publication_year' => 2011,
                    'description' => 'Todos los efectos de la electricidad pueden explicarse y predecirse presumiendo la existencia de una diminuta partícula denominada electrón. Aplicando esta teoría electrónica, los hombres de ciencia han hecho predicciones y descubrimientos que pocos años atrás parecían imposibles.',
                    'image_public_id' => 'Electricidad_Básica_eu1umx',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681260/electricidad_basica_ii_oxdl53.pdf'

                ],
                [
                    'category_id' => 19,
                    'title' => 'Let s Switch On! Inglés para Electricidad y Electrónica',
                    'author' => 'Maria Esteban',

                    'language' => 'en',
                    'publication_year' => 2015,
                    'description' => 'Let is Switch On! is a new method specifically tailored to the needs of students studying Ciclos Formativos de la familia profesional de Electricidad y Electrónica. This course provides students with basic and necessary English to enable them to develop in today is professional world.The content of the book follows the academic syllabus of these studies and adapts to the self-reflexive demand of the Common European Framework of Reference for Languages',
                    'image_public_id' => 'Let_s_Switch_On_Inglés_para_Electricidad_y_Electrónica_ztzcdb',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681097/9788428398817_1_zv57ni.pdf'

                ],
                [
                    'category_id' => 19,
                    'title' => 'Electricidad y Magnetismo',
                    'author' => 'German Arenas Sicard',

                    'language' => 'es',
                    'publication_year' => 2008,
                    'description' => 'Electricidad y Magnetismo, es un libro que aborda los conceptos fundamentales de la electricidad y el magnetismo. Proporciona una introducción a la electricidad, la carga eléctrica, la corriente eléctrica, las fuerzas y campos eléctricos, el potencial electrostático, las fuerzas magnéticas y los campos magnéticos.',
                    'image_public_id' => 'Electricidad_y_Magnetismo_evu4ro',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681257/Electricidad_y_Magnetismo_Germ%C3%A1n_Arenas_Sicard_j4bhrh.pdf'

                ],
                [
                    'category_id' => 19,
                    'title' => 'Residential Wiring and Electrical Best Practices',
                    'author' => 'Strathcona County',

                    'language' => 'en',
                    'publication_year' => 2019,
                    'description' => 'Residential Wiring and Electrical Best Practices, es una guía que describe métodos de instalación y prácticas recomendadas en la conexión eléctrica residencial. Se enfoca en cumplir con el Código Eléctrico Canadiense y ofrece información sobre quién puede realizar instalaciones eléctricas, requisitos de permisos, procesos de inspección y normas generales para cables y cajas de salida.',
                    'image_public_id' => null,
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681097/27._Residential_Wiring_and_Electrical_Best_Practices_Ingl%C3%A9s_autor_Strathcona_County_u4fygj.pdf'

                ],
                [
                    'category_id' => 19,
                    'title' => 'Residential Wiring Guide',
                    'author' => 'Anonimo',

                    'language' => 'en',
                    'publication_year' => 2018,
                    'description' => 'Residential Wiring Guide, es una guía de instalación de cableado residencial que cumple con los estándares establecidos por el Código Eléctrico de Manitoba. Proporciona información precisa sobre los requisitos de seguridad y cumplimiento del código para evitar riesgos de choque eléctrico y incendios.',
                    'image_public_id' => 'Residential_Wiring_Guide_hfcdxk',
                    'pdf_file' => 'https://res.cloudinary.com/doirzq4zq/image/upload/v1733681096/24._Residential_Wiring_Guide_Ingl%C3%A9s_autor_Manitoba_Hydro_knlkwo.pdf'

                ],
           
            ];

            foreach ($books as $book) {
                Book::create([
                    'category_id' => $book['category_id'],
                    'title' => $book['title'],
                    'author' => $book['author'],
                    'language' => $book['language'],
                    'publication_year' => $book['publication_year'],
                    'description' => $book['description'],
                    'image_public_id' => $book['image_public_id'],
                    'digital_version_link' => $book['pdf_file'],  // Usamos la URL directa del PDF
            
                ]);
            }
        }
    }
