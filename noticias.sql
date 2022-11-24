-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 17:44:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticias`
--
CREATE DATABASE IF NOT EXISTS `noticias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `noticias`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_noticia`
--

CREATE TABLE `tabla_noticia` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `resumen` varchar(1000) NOT NULL,
  `noticia` varchar(4000) NOT NULL,
  `fecha` date NOT NULL,
  `categoria` varchar(50) NOT NULL DEFAULT 'Otra Categoría'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla_noticia`
--

INSERT INTO `tabla_noticia` (`id`, `titulo`, `imagen`, `resumen`, `noticia`, `fecha`, `categoria`) VALUES
(34, 'Familiares de diputados utilizan tarjetas pagadas con fondos públicos para cargar combustible', 'rechaza-recurso.jpg', 'El sistema de tarjetas fue implementado en 2018 para evitar fraudes, din embargo Ciper denuncia varias vulneraciones al reglamento de uso.', 'Una investigación de Ciper da cuenta de que algunos diputados utilizan de manera irregular sus tarjetas de carga de bencinas, registrando su uso por familiares y amigos, lo que contraviene las reglas de su beneficio.\r\n\r\nLos parlamentarios cuentan con unas tarjetas para cargar combustibles a sus vehículos, las que están asociadas a una clave personal, un RUT y una patente, por lo que se supone es un sistema difícil de vulnerar, este sistema fue implementa en 2018.', '2022-11-22', 'Politica'),
(35, 'Científico chileno es reconocido como uno de los más citados del mundo: ha publicado 700 papers', 'jose-rodriguez-perez-750x400.webp', 'El científico e investigador chileno Diego Aracena es reconocido como uno de los más influyentes del mundo desde 2014.', 'El científico chileno, José Rodríguez Pérez, fue reconocido por novena vez en la lista de los investigadores más citados del mundo. Así lo determinó Web of Science, el servicio en línea de información científica, suministrado por Clarivate Analytics.\r\n\r\nEste organismo es una de las más grandes bases de datos de conocimientos científicos y por ende permite el acceso a citas de artículos de revistas, libros y otros materiales que abarcan todos los campos de la ciencia académica.\r\n\r\nAsí es como todos los años, Web of Science establece el listado “Highly Cited Researchers”, donde enumera a los científicos más referenciados por sus colegas en todo el planeta.', '2022-11-24', 'Deportes'),
(37, 'Con puños y patadas: médico agrede a paciente en pleno recinto de salud en Talcahuano', 'con_puños_y_patadas_médico_talcahuanowebp.webp', 'Paciente, que iba por una ecografía en una pierna, había realizado un reclamo por los tiempos de espera. Ambos fueron detenidos por riña. El profesional de la salud fue despedido del centro de salud.', 'En el centro médico Aníbal Pinto, un médico agredió con puños y patadas a un paciente que esperaba por ser atendido. Según el relato de la esposa del paciente, Jaqueline Herrera, el hombre se encontraba esperando su turno, para hacerse una ecografía en una pierna, cuando en un momento fue a preguntar cuánto faltaba para ser atendido. En ese instante, viendo que se acercaba la hora para ir a su trabajo, pidió que le devolvieran el dinero ya que no quería seguir esperando.\r\n\r\nEl médico salió de su box y ahí el paciente, que estaba caminando con una muleta, le habría señalado que “no debería seguir ejerciendo como médico”. Tras ello, el profesional de la salud se abalanzó contra él con varios golpes. “Lo empezó a patear de una manera... Combos en la cabeza hasta decir basta. Yo no hallaba qué hacer para defenderlo. Agarré mi mochila y lo agarré a mochilazos”, dijo la mujer.', '2022-11-24', 'Otro'),
(38, '’Casado con Hijos’ vuelve a la televisión luego de 15 años: habrá cambios en la familia Larraín', 'casado-con-hijos-750x400.webp', 'La exitosa comedia retornará a la pantalla de Mega durante el primer semestre de 2023. Conservó su elenco original, pero con cambios en la trama.', 'Este viernes se confirmó el regreso de uno de los sitcom más exitosos en la TV chilena. Se trata de Casado con Hijos, que regresará quince años después con su mismo elenco y con una trama actualizada.\r\n\r\nDe acuerdo a lo señalado por El Mercurio, se tratará de una temporada de 30 capítulo de una hora de duración, los cuales serán emitidos por Mega durante 2023.', '2022-11-24', 'Otro'),
(39, '\"Cayó en la trampa\": La imagen que reveló estrategia de Arabia Saudita para vencer a Argentina', '75acb6ab7d56758f173cdc346302343671bc845aw.jpg', 'El diario Olé realizó un análisis táctico que mostró claramente el trabajo que realizó el elenco saudí para frenar a la albiceleste.', 'La sorpresiva derrota de Argentina ante Arabia Saudita en su debut en el Mundial de Qatar 2022 impactó al mundo y dejó a los trasandinos buscando respuestas sobre qué ocurrió con el equipo liderado por Lionel Messi que, al menos en el papel, era favorito.\r\n\r\nEn ese contexto, el diario Olé hizo un análisis táctico y reveló la estrategia con la que el conjunto saudí logró la hazaña, donde una imagen la muestra claramente.', '2022-11-24', 'Deportes'),
(40, 'Batalla campal: mexicanos y argentinos se pelearon en las calles de Qatar a días de crucial juego', 'pelea-hinchas-argentinos-mexicanos-qatar-mundial-750x400.webp', 'Hinchas argentinos y mexicanos protagonizaron una batalla campal en Doha. Esto en la previa de un duelo decisivo por el Grupo C del Mundial', 'Argentina y México ‘calentaron’ su duelo mundialista del próximo sábado por el Grupo C. Hinchas de ambas selecciones protagonizaron una batalla campal en Doha, con insultos y golpes de puño.\r\n\r\nEn momentos que se jugaba el duelo entre España y Costa Rica, loa aficionados mexicanos y argentinos se toparon en las afueras del Estadio Al Thumama y su encuentro no fue para nada cordial.\r\n\r\nVideos que circulan en redes sociales muestran el momento en que fanáticos ‘albicelestes’ y del ‘Tri’ comienzan a insultarse en los alrededores del estadio donde la ‘Furia Roja’ goleó por 7-0 a los ‘ticos’.', '2022-11-24', 'Deportes'),
(41, 'La NASA investiga una pérdida de comunicación con la nave Orion', 'fotonoticia_20221124141847_640.webp', 'Nave Orion de la misión Artemis I con la Luna al fondo - NASA.', 'La NASA investiga una pérdida de comunicación con la nave Orion\r\n\r\n\r\nLa NASA perdió inesperadamente el contacto con su cápsula Orion con destino a la Luna durante la madrugada del 23 de noviembre, por razones que están siendo investigadas.    Tras siete días de misión exitosa que llevaron a Artemis I a la órbita lunar, los controladores de la misión perdieron la comunicación con la nave espacial a las 6.09 UTC. Después de 47 minutos de silencio, se restableció el contacto.\r\n\r\nLeer más: https://www.europapress.es/ciencia/misiones-espaciales/noticia-nasa-investiga-perdida-comunicacion-nave-orion-20221124141847.html\r\n\r\n(c) 2022 Europa Press. Está expresamente prohibida la redistribución y la redifusión de este contenido sin su previo y expreso consentimiento.\r\n', '2022-11-24', 'Cientificas'),
(42, 'Paro de camioneros: gobierno presenta primeras 13 querellas por Ley de Seguridad del Estado', 'S6EO5LJTWFCTLMDI447X6BH6YQ.jpg', 'El ministro del Interior (s), Manuel Monsalve, informó que Carabineros comenzó el despeje de las rutas bloqueadas, operativo que deja hasta ahora cuatro personas detenidas.', 'Luego que desde el gobierno se informara este miércoles que invocaría la Ley de Seguridad del Estado ante las movilizaciones de camioneros que continúan bloqueando algunas rutas del país, el ministro del Interior (s), Manuel Monsalve, señaló esta noche que el gobierno ya ha presentado 13 querellas en este sentido.\r\n\r\nAsimismo, personal de Carabineros ha procedido al despeje de las rutas bloqueadas dejando un saldo hasta el momento de cuatro personas detenidas en la Región de Coquimbo.\r\n\r\n“Se han redactado y enviado ya 27 querellas, de las cuales, en este momento, ya están presentadas 13 en las regiones de Arica, de Tarapacá, de Antofagasta, de Coquimbo, de Valparaíso y de la Región Metropolitana”, informó Monsalve.', '2022-11-24', 'Politica'),
(43, '“¡Respeto!”: Qataríes aplauden a los japoneses por llevarse la basura y dejar soplado el estadio', '4STIMLLL4ZFF5D2IA6UYIJ6Z34.jpg', 'Para tomar nota: antes de correr a festejar, los asiáticos recogieron toda la basura.', 'Otra vez dan el ejemplo. En vez de salir corriendo del estadio a celebrar su histórico triunfo sobre Alemania en el Mundial de Qatar 2022, los hinchas japoneses no se fueron sin recoger hasta el último papelito tirado en las tribunas.\r\n\r\nHaciendo gala de su conocida disciplina, tras su exitoso debut en la copa mundial los nipones sacaron bolsas y comenzaron a llenarlas de botellas, vasos y todo tipo de desechos que pillaran entre los asientos.', '2022-11-23', 'Deportes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_noticia`
--
ALTER TABLE `tabla_noticia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_noticia`
--
ALTER TABLE `tabla_noticia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
