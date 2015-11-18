-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2015 alle 23:52
-- Versione del server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ElectronicsHub`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAuthor` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `articleImage` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAuthor` (`idAuthor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dump dei dati per la tabella `article`
--

INSERT INTO `article` (`id`, `idAuthor`, `title`, `description`, `text`, `date`, `articleImage`) VALUES
(1, 1, 'Il Transistor', 'il funzionamento e i vari tipi di transistor', '<p>Il&nbsp;<strong>transistor</strong>&nbsp;(<a href="https://it.wikipedia.org/wiki/Crasi">crasi</a>&nbsp;del termine&nbsp;<a href="https://it.wikipedia.org/wiki/Lingua_inglese">inglese</a>&nbsp;<em>transconductance-varistor</em>), detto anche&nbsp;<strong>transistore</strong>, &egrave; un&nbsp;<a href="https://it.wikipedia.org/wiki/Dispositivo_a_semiconduttore">dispositivo a semiconduttore</a>&nbsp;largamente usato sia nell&#39;<a href="https://it.wikipedia.org/wiki/Elettronica_analogica">elettronica analogica</a>&nbsp;che nell&#39;<a href="https://it.wikipedia.org/wiki/Elettronica_digitale">elettronica digitale</a>.</p>\r\n\r\n<p>Il termine &egrave; stato spesso utilizzato nel linguaggio comune anche per identificare le piccole&nbsp;<a href="https://it.wikipedia.org/wiki/Radio_(apparecchio)">radio</a>&nbsp;<a href="https://it.wikipedia.org/wiki/Onde_medie">AM</a>&nbsp;portatili a<a href="https://it.wikipedia.org/wiki/Batteria_(chimica)">pile</a>, che furono la prima applicazione di questi dispositivi a raggiungere il mercato di massa, negli&nbsp;<a href="https://it.wikipedia.org/wiki/Anni_1950">anni cinquanta</a>&nbsp;del&nbsp;<a href="https://it.wikipedia.org/wiki/XX_secolo">XX secolo</a>.</p>\r\n\r\n<p><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/5/5a/Transistors.agr.jpg" style="float:right; height:252px; width:300px" /></p>\r\n\r\n<h1>Storia</h1>\r\n\r\n<p>Il&nbsp;<a href="https://it.wikipedia.org/wiki/Fisica">fisico</a>&nbsp;<a href="https://it.wikipedia.org/wiki/Julius_Edgar_Lilienfeld">Julius Edgar Lilienfeld</a>&nbsp;progett&ograve; il primo transistor in&nbsp;<a href="https://it.wikipedia.org/wiki/Canada">Canada</a>&nbsp;nel&nbsp;<a href="https://it.wikipedia.org/wiki/1925">1925</a>, descrivendo un dispositivo simile all&#39;attuale&nbsp;<a href="https://it.wikipedia.org/wiki/Transistor_ad_effetto_di_campo">transistor ad effetto di campo</a>.<a href="https://it.wikipedia.org/wiki/Transistor#cite_note-1">[1]</a>&nbsp;Tuttavia Lilienfeld non pubblic&ograve; alcuna ricerca a tal proposito, e nel 1934 l&#39;inventore tedesco&nbsp;<a href="https://it.wikipedia.org/wiki/Oskar_Heil">Oskar Heil</a>&nbsp;brevett&ograve; un dispositivo molto simile.<a href="https://it.wikipedia.org/wiki/Transistor#cite_note-2">[2]</a></p>\r\n\r\n<p>Il primo transistor era realizzato con due elettrodi le cui punte molto sottili e distanti tra loro alcuni centesimi di millimetro, per la precisione da 127 a 50&nbsp;<a href="https://it.wikipedia.org/wiki/Micron">micron</a>, erano premute sulla superficie di una piastrina di un cristallo di germanio molto puro, policristallino e di tipo n. La tecnica del contatto puntiforme era gi&agrave; nota ed utilizzata per la costruzione dei diodi rivelatori. Provvisoriamente, dato che il transistor funzionava in modo analogo ad un&nbsp;<a href="https://it.wikipedia.org/wiki/Triodo">triodo</a>, venne chiamato&nbsp;<em>triodo a stato solido</em>: il nome definitivo deriva dall&#39;unione dei termini &quot;<a href="https://it.wikipedia.org/wiki/Transconduttanza">TRANSconductance</a>&quot; e &quot;<a href="https://it.wikipedia.org/wiki/Varistore">varISTOR</a>&quot;. Il primo prototipo funzionante fu realizzato nel mese di dicembre del<a href="https://it.wikipedia.org/wiki/1947">1947</a>&nbsp;da due ricercatori dei laboratori&nbsp;<a href="https://it.wikipedia.org/wiki/Bell_Labs">Bell Labs</a>:&nbsp;<a href="https://it.wikipedia.org/wiki/Walter_Brattain">Walter Brattain</a>&nbsp;e&nbsp;<a href="https://it.wikipedia.org/wiki/John_Bardeen">John Bardeen</a>&nbsp;del gruppo di ricerca guidato da&nbsp;<a href="https://it.wikipedia.org/wiki/William_Shockley">William Shockley</a>. Era questo il transistor a contatti puntiformi (a punte) mentre si deve a&nbsp;<a href="https://it.wikipedia.org/wiki/William_Shockley">William Shockley</a>l&#39;ideazione, nel gennaio 1948<a href="https://it.wikipedia.org/wiki/Transistor#cite_note-3">[3]</a>, e la formulazione, nella primavera dell&#39;anno successivo, della teoria del transistor a giunzione chiamato inizialmente dallo stesso Shockley, nel suo diario di laboratorio, &quot;sandwich transistor&quot;. Nel 1956 i tre ricercatori furono insigniti del&nbsp;<a href="https://it.wikipedia.org/wiki/Premio_Nobel_per_la_Fisica">premio Nobel per la Fisica</a>&nbsp;con la motivazione &laquo;per le ricerche sui semiconduttori e per la scoperta dell&#39;effetto transistor&raquo;. Gi&agrave; verso la fine degli anni &#39;50 la produzione di transistor si orient&ograve; verso l&#39;utilizzo del silicio come elemento semiconduttore e negli anni &#39;70 il transistor al germanio divenne obsoleto.</p>\r\n\r\n<p>I tipi di contenitori del dispositivo si sono moltiplicate, e negli anni sono stati usati materiali come la&nbsp;<a href="https://it.wikipedia.org/wiki/Ceramica">ceramica</a>, il&nbsp;<a href="https://it.wikipedia.org/wiki/Metallo">metallo</a>, la&nbsp;<a href="https://it.wikipedia.org/wiki/Plastica">plastica</a>&nbsp;o assemblaggi misti. Negli anni &#39;60 venne usato anche il&nbsp;<a href="https://it.wikipedia.org/wiki/Vetro">vetro</a>: il produttore europeo&nbsp;<a href="https://it.wikipedia.org/wiki/Philips">Philips</a>, racchiudeva i propri dispositivi di piccola potenza, ad esempio quelli siglati OC70, OC71, in un&#39;ampollina cilindrica in vetro verniciata in nero, riempita di grasso al&nbsp;<a href="https://it.wikipedia.org/wiki/Silicone">silicone</a>. Nel caso il dispositivo avesse dissipazione maggiore, come l&#39;OC72, il dispositivo era ricoperto semplicemente da un cappuccio in alluminio, avendo&nbsp;<a href="https://it.wikipedia.org/wiki/Reoforo">reofori</a>&nbsp;identici, il collettore era contraddistinto da un puntino di vernice rossa scura. Nel tempo molte tipologie di contenitori sono andate in disuso a favore di geometrie pi&ugrave; efficienti nello smaltimento del calore prodotto. I dispositivi di potenza attuali per bassa frequenza, compresi alcune tipologie di&nbsp;<a href="https://it.wikipedia.org/wiki/Diodo">diodi</a>&nbsp;e di&nbsp;<a href="https://it.wikipedia.org/wiki/Circuito_integrato">IC</a>, vengono assemblati nel contenitore standard definito&nbsp;<a href="https://it.wikipedia.org/wiki/TO-3">TO-3</a>, provvisto di due flange forate, adatte al fissaggio sul&nbsp;<a href="https://it.wikipedia.org/wiki/Dissipatore_(elettronica)">dissipatore</a>&nbsp;tramite una coppia di viti. Realizzato in&nbsp;<a href="https://it.wikipedia.org/wiki/Acciaio">acciaio</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Rame">rame</a>, o&nbsp;<a href="https://it.wikipedia.org/wiki/Alluminio">alluminio</a>, con temperatura ambiente di 25&nbsp;&deg;C &egrave; in grado di trasferire al dissipatore, 300 watt di potenza termica generata dal&nbsp;<a href="https://it.wikipedia.org/wiki/Die_(elettronica)">Die</a>.</p>\r\n\r\n<p>Con riguardo al movimento delle cariche elettriche all&#39;interno del dispositivo, i transistor sono indicati come&nbsp;<a href="https://it.wikipedia.org/wiki/Transistor_bipolare">transistor bipolari</a>, in cui sia&nbsp;<a href="https://it.wikipedia.org/wiki/Elettrone">elettroni</a>&nbsp;che<a href="https://it.wikipedia.org/wiki/Lacuna_(fisica)">lacune</a>&nbsp;contribuiscono al passaggio della corrente. Sia il transistor a contatti puntiformi che quello a giunzione sono transistor di tipo bipolare. Il tipo a contatti puntiformi, d&#39;importanza storica per essere stato il primo realizzato ed a trovare, seppure limitatamente, pratica applicazione, divent&ograve; presto obsoleto per essere soppiantato da quello a giunzione, pi&ugrave; stabile e meno rumoroso. In seguito furono creati altri tipi di transistor, in cui il passaggio di corrente avveniva grazie ad un solo tipo di&nbsp;<a href="https://it.wikipedia.org/wiki/Portatore_di_carica">portatori di carica</a>: questi dispositivi sono i&nbsp;<a href="https://it.wikipedia.org/wiki/Transistor_ad_effetto_di_campo">transistor ad effetto di campo</a>. Entrambe le tipologie, nel tempo, hanno dato origine a molti tipi diversi di transistor, usati per gli scopi pi&ugrave; vari. Lo&nbsp;<a href="https://it.wikipedia.org/wiki/Strumento_di_misura">strumento di misura</a>&nbsp;utilizzato per la verifica e la caratterizzazione dei molteplici parametri dei transistor, nonch&eacute; dei&nbsp;<a href="https://it.wikipedia.org/wiki/Diodo">diodi</a>, &egrave; il&nbsp;<a href="https://it.wikipedia.org/w/index.php?title=Curve_tracer&amp;action=edit&amp;redlink=1">curve tracer</a>&nbsp;(tracciacurve), termine dato allo strumento in relazione ai segnali elettrici visualizzati sotto forma di grafico somiglianti a molteplici &quot;curve&quot;, l&#39;aspetto &egrave; simile ad un&nbsp;<a href="https://it.wikipedia.org/wiki/Oscilloscopio">oscilloscopio</a>: questo tipo di strumento &egrave; storicamente prodotto dalla societ&agrave;&nbsp;<a href="https://it.wikipedia.org/wiki/Tektronix">Tektronix</a>.</p>\r\n', '2015-10-26 07:21:25', 'Data/articles_images/transistor.gif'),
(2, 1, 'La resistenza elettrica', 'Parliamo della fisica alla base delle resistenze', '<p>La&nbsp;<strong>resistenza elettrica</strong>&nbsp;&egrave; una&nbsp;<a href="https://it.wikipedia.org/wiki/Grandezza_fisica_scalare">grandezza fisica scalare</a>&nbsp;che misura la tendenza di un&nbsp;<a href="https://it.wikipedia.org/wiki/Corpo_(fisica)">corpo</a>&nbsp;ad opporsi al passaggio di una&nbsp;<a href="https://it.wikipedia.org/wiki/Corrente_elettrica">corrente elettrica</a>, quando sottoposto ad una&nbsp;<a href="https://it.wikipedia.org/wiki/Tensione_elettrica">tensione elettrica</a>. Questa opposizione dipende dal&nbsp;<a href="https://it.wikipedia.org/wiki/Materiale">materiale</a>&nbsp;con cui &egrave; realizzato, dalle sue dimensioni e dalla sua&nbsp;<a href="https://it.wikipedia.org/wiki/Temperatura">temperatura</a>. Uno degli effetti del passaggio di corrente in un&nbsp;<a href="https://it.wikipedia.org/wiki/Conduttore_elettrico">conduttore</a>&nbsp;&egrave; il suo riscaldamento (<a href="https://it.wikipedia.org/wiki/Effetto_Joule">effetto Joule</a>).<img alt="" src="https://upload.wikimedia.org/wikipedia/commons/6/68/Resistivity_geometry.png" style="float:right; height:225px; width:250px" /></p>\r\n\r\n<h1>Definizione</h1>\r\n\r\n<p>La resistenza&nbsp;<em>R</em>&nbsp;&egrave; l&#39;inverso della&nbsp;<a href="https://it.wikipedia.org/wiki/Conduttanza_elettrica">conduttanza elettrica</a>&nbsp;<em>G</em>, definita per un conduttore cilindrico come<a href="https://it.wikipedia.org/wiki/Resistenza_elettrica#cite_note-Tur222-1">[1]</a>:</p>\r\n\r\n<p><img alt="R=frac 1 G = {{L}over sigma S} = {{\rho L}over S}" src="https://upload.wikimedia.org/math/2/1/d/21d974fc0d5cbfe90be0fa364054b39e.png" /></p>\r\n\r\n<p>dove:</p>\r\n\r\n<ul>\r\n	<li><em><a href="https://it.wikipedia.org/wiki/Sigma_(lettera_greca)">&sigma;</a></em>&nbsp;&egrave; la&nbsp;<a href="https://it.wikipedia.org/wiki/Conducibilit%C3%A0_elettrica">conducibilit&agrave; elettrica</a>&nbsp;misurata in&nbsp;<a href="https://it.wikipedia.org/wiki/Siemens_(unit%C3%A0_di_misura)">S</a>/<a href="https://it.wikipedia.org/wiki/Metro">m</a>, il cui inverso&nbsp;<em><a href="https://it.wikipedia.org/wiki/Rho">&rho;</a></em>&nbsp;&egrave; la&nbsp;<a href="https://it.wikipedia.org/wiki/Resistivit%C3%A0_elettrica">resistivit&agrave; elettrica</a></li>\r\n	<li><em>L</em>&nbsp;&egrave; la distanza (misurata in&nbsp;<a href="https://it.wikipedia.org/wiki/Metro">m</a>) dei punti tra i quali &egrave; misurata la resistenza (misurata in&nbsp;<a href="https://it.wikipedia.org/wiki/Ohm">&Omega;</a>)</li>\r\n	<li><em>S</em>&nbsp;&egrave; l&#39;<a href="https://it.wikipedia.org/wiki/Area">area</a>&nbsp;della sezione del campione perpendicolare alla direzione della corrente (misurata in&nbsp;<a href="https://it.wikipedia.org/wiki/Metro_quadrato">m</a>2).</li>\r\n</ul>\r\n\r\n<p>Nel&nbsp;<a href="https://it.wikipedia.org/wiki/Sistema_internazionale_di_unit%C3%A0_di_misura">sistema internazionale</a>&nbsp;l&#39;<a href="https://it.wikipedia.org/wiki/Unit%C3%A0_di_misura">unit&agrave; di misura</a>&nbsp;della resistenza elettrica &egrave; l&#39;ohm(<a href="https://it.wikipedia.org/wiki/Ohm">&Omega;</a>). Nel caso di&nbsp;<a href="https://it.wikipedia.org/wiki/Corrente_continua">corrente continua</a>&nbsp;e in assenza di&nbsp;<a href="https://it.wikipedia.org/wiki/Forza_elettromotrice">forza elettromotrice</a>all&#39;interno del conduttore considerato vale la seguente propriet&agrave;:<a href="https://it.wikipedia.org/wiki/Resistenza_elettrica#cite_note-iupac-2">[2]</a></p>\r\n\r\n<p><img alt=" R = frac{Delta V}{I}" src="https://upload.wikimedia.org/math/c/f/8/cf82ea0d12be6f7aa67ff92a827264c3.png" /></p>\r\n\r\n<p>dove:</p>\r\n\r\n<ul>\r\n	<li><em>V</em>&nbsp;la&nbsp;<a href="https://it.wikipedia.org/wiki/Tensione_elettrica">tensione</a>&nbsp;a cui &egrave; sottoposto il corpo;</li>\r\n	<li><em>I</em>&nbsp;&egrave; l&#39;<a href="https://it.wikipedia.org/wiki/Intensit%C3%A0_di_corrente">intensit&agrave; di corrente</a>&nbsp;che attraversa il corpo.</li>\r\n</ul>\r\n\r\n<p>che esprime la&nbsp;<a href="https://it.wikipedia.org/wiki/Legge_di_Ohm">legge di Ohm</a>&nbsp;in forma macroscopica solo per componenti a&nbsp;<em>geometria costante</em>&nbsp;o pi&ugrave; precisamente per L e S costanti.</p>\r\n\r\n<p>In generale &egrave; sempre osservato il manifestarsi della correlazione rispettivamente tra passaggio di corrente,&nbsp;<a href="https://it.wikipedia.org/wiki/Effetto_Joule">effetto Joule</a>&nbsp;e presenza di una tensione tra i capi di un qualsiasi conduttore macroscopico: la resistenza non &egrave; mai sperimentalmente non positiva o infinita.</p>\r\n\r\n<p><img alt="(0 &lt; R I^2 &lt; + infty) and (I&gt;0) quad Rightarrow quad 0 &lt; R &lt; + infty  " src="https://upload.wikimedia.org/math/7/3/5/735bd93e10d92135cbd5017de195c028.png" />.</p>\r\n\r\n<p>Spingendosi oltre si pu&ograve; affermare che questo valga anche a livello microscopico per la&nbsp;<em>resistivit&agrave;</em>: non si &egrave; mai osservato in natura n&eacute; un perfetto<a href="https://it.wikipedia.org/wiki/Conduttore_elettrico">conduttore elettrico</a>&nbsp;n&eacute; un perfetto&nbsp;<a href="https://it.wikipedia.org/wiki/Isolante_elettrico">isolante elettrico</a>.</p>\r\n', '2015-10-26 00:00:00', 'Data/articles_images/resistenza.jpg'),
(3, 1, 'Il condensatore', 'Esploriamo questa parte fondamentale dei circuiti', '<p>Il&nbsp;<strong>condensatore</strong>&nbsp;&egrave; un&nbsp;<a href="https://it.wikipedia.org/wiki/Componente_elettrico">componente elettrico</a>&nbsp;che immagazzina l&#39;<a href="https://it.wikipedia.org/wiki/Energia">energia</a>&nbsp;in un&nbsp;<a href="https://it.wikipedia.org/wiki/Campo_elettrostatico">campo elettrostatico</a>.</p>\r\n\r\n<p>Nella&nbsp;<a href="https://it.wikipedia.org/wiki/Teoria_dei_circuiti">teoria dei circuiti</a>&nbsp;il condensatore &egrave; un componente&nbsp;<em>ideale</em>&nbsp;che pu&ograve; mantenere la&nbsp;<a href="https://it.wikipedia.org/wiki/Carica_elettrica">carica</a>&nbsp;e l&#39;<a href="https://it.wikipedia.org/wiki/Energia">energia</a>accumulata all&#39;infinito. Nei circuiti in&nbsp;<a href="https://it.wikipedia.org/wiki/Regime_sinusoidale">regime sinusoidale</a>&nbsp;permanente la&nbsp;<a href="https://it.wikipedia.org/wiki/Corrente_elettrica">corrente</a>&nbsp;che attraversa un condensatore ideale risulta in anticipo di un quarto di&nbsp;<a href="https://it.wikipedia.org/wiki/Periodo_(fisica)">periodo</a>&nbsp;rispetto alla tensione che &egrave; applicata ai suoi morsetti.</p>\r\n\r\n<h1><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/c/cd/Capacitor_schematic_with_dielectric.svg" style="float:left; height:330px; width:300px" /></h1>\r\n\r\n<p>Se si applica una&nbsp;<a href="https://it.wikipedia.org/wiki/Tensione_elettrica">tensione elettrica</a>&nbsp;alle armature, le cariche elettriche si separano e si genera un&nbsp;<a href="https://it.wikipedia.org/wiki/Campo_elettrico">campo elettrico</a>&nbsp;all&#39;interno del dielettrico. L&#39;armatura collegata al&nbsp;<a href="https://it.wikipedia.org/wiki/Potenziale_elettrico">potenziale</a>pi&ugrave; alto si carica positivamente, negativamente l&#39;altra. Le cariche positive e negative sono uguali ed il loro valore assoluto costituisce la carica&nbsp;<em>Q</em>&nbsp;del condensatore. La carica &egrave; proporzionale alla tensione applicata e la costante di proporzionalit&agrave; &egrave; una caratteristica di quel particolare condensatore che si chiama&nbsp;<em>capacit&agrave; elettrica</em>&nbsp;e si misura in&nbsp;<a href="https://it.wikipedia.org/wiki/Farad">farad</a>:</p>\r\n\r\n<p><img alt="C = frac {Q}{Delta V}" src="https://upload.wikimedia.org/math/6/c/1/6c1409ac6c25e48252958d92b61484e8.png" /></p>\r\n\r\n<p>Ossia la capacit&agrave; &egrave; uguale al rapporto tra la carica elettrica fornita Q e la tensione elettrica applicata &Delta;V. La capacit&agrave; di un condensatore piano (armature piane e parallele) &egrave; proporzionale al rapporto tra la superficie&nbsp;<em>S</em>&nbsp;di una delle armature e la loro distanza&nbsp;<em>d</em>. La costante di proporzionalit&agrave; &egrave; una caratteristica dell&#39;isolante interposto e si chiama&nbsp;<strong><a href="https://it.wikipedia.org/wiki/Costante_dielettrica">permittivit&agrave; elettrica</a>&nbsp;assoluta</strong>&nbsp;e si misura in farad/<a href="https://it.wikipedia.org/wiki/Metro">m</a>.</p>\r\n\r\n<p>La capacit&agrave; di un condensatore piano a facce parallele &egrave; quindi:</p>\r\n\r\n<p><img alt="C = varepsilon frac {S}{d}" src="https://upload.wikimedia.org/math/0/b/d/0bdc6c790223430def99d275f42e309f.png" /></p>\r\n\r\n<p>In figura non sono rappresentati i cosiddetti&nbsp;<em>effetti di bordo</em>&nbsp;ai confini delle facce parallele dove le linee di forza del campo elettrico da una faccia all&#39;altra non sono pi&ugrave; rettilinee ma via via pi&ugrave; curve.</p>\r\n', '2015-10-26 07:28:49', 'Data/articles_images/condensatore.JPG'),
(39, 1, 'Amplificatore operazionale', 'Vediamo come funziona questo integrato fondamentale', '<p>In&nbsp;<a href="https://it.wikipedia.org/wiki/Elettronica">elettronica</a>, un&nbsp;<strong>amplificatore operazionale</strong>&nbsp;(in&nbsp;<a href="https://it.wikipedia.org/wiki/Lingua_inglese">inglese</a>&nbsp;<em>operational amplifier</em>&nbsp;oppure&nbsp;<em>op-amp</em>) &egrave; un&nbsp;<a href="https://it.wikipedia.org/wiki/Amplificatore_differenziale">amplificatore differenziale</a>&nbsp;<a href="https://it.wikipedia.org/wiki/Accoppiamento_(elettrotecnica)">accoppiato in continua</a>&nbsp;avente (solitamente) una sola uscita. Grazie anche alla sua versatilit&agrave;, &egrave; uno dei dispositivi pi&ugrave; vastamente utilizzati sia in ambito commerciale che scientifico, in particolar modo nei&nbsp;<a href="https://it.wikipedia.org/wiki/Elettronica_analogica">circuiti analogici</a>.</p>\r\n\r\n<p><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/4/43/Ua741_opamp.jpg" style="float:left; height:267px; width:400px" /></p>\r\n\r\n<p>Si tratta di un circuito caratterizzato da</p>\r\n\r\n<p>un&nbsp;<a href="https://it.wikipedia.org/wiki/Guadagno_(elettronica)">guadagno</a>&nbsp;di&nbsp;<a href="https://it.wikipedia.org/wiki/Tensione_elettrica">tensione</a>&nbsp;e una&nbsp;<a href="https://it.wikipedia.org/wiki/Resistenza_elettrica">resistenza</a>&nbsp;d&#39;ingresso molto elevati che si suppongono idealmente di valore infinito, e una resistenza d&#39;uscita molto piccola, che analogamente si pone idealmente nulla. Da tali supposizioni, che consentono nella pratica di svolgere i calcoli per controllare il funzionamento della&nbsp;<a href="https://it.wikipedia.org/wiki/Retroazione">retroazione</a>, discendono due propriet&agrave; ideali fondamentali: la differenza tra le tensioni applicate in ingresso &egrave; nulla (se la retroazione &egrave; negativa), e le correnti di ingresso sono nulle.</p>\r\n\r\n<p>Il nome &egrave; dovuto al fatto che, con esso, &egrave; possibile realizzare&nbsp;<a href="https://it.wikipedia.org/wiki/Circuiti_elettronici">circuiti elettronici</a>&nbsp;in grado di effettuare numerose operazioni matematiche: la&nbsp;<a href="https://it.wikipedia.org/wiki/Addizione">somma</a>, la&nbsp;<a href="https://it.wikipedia.org/wiki/Sottrazione">sottrazione</a>, la&nbsp;<a href="https://it.wikipedia.org/wiki/Derivata">derivata</a>, l&#39;<a href="https://it.wikipedia.org/wiki/Integrale">integrale</a>, il calcolo di&nbsp;<a href="https://it.wikipedia.org/wiki/Logaritmo">logaritmi</a>&nbsp;e di&nbsp;<a href="https://it.wikipedia.org/wiki/Antilogaritmo">antilogaritmi</a>. Nella maggior parte delle applicazioni l&#39;amplificatore operazionale &egrave; costituito da un&nbsp;<a href="https://it.wikipedia.org/wiki/Circuito_integrato">circuito integrato</a>.</p>\r\n\r\n<p>La maggior parte degli amplificatori operazionali &egrave; progettata per lavorare con una tensione di alimentazione duale, cio&egrave; con un valore positivo ed uno negativo, simmetrici rispetto ad una&nbsp;<a href="https://it.wikipedia.org/wiki/Massa_(elettronica)">massa</a>. Le due tensioni di alimentazione non necessariamente debbono avere lo stesso valore: ad esempio la&nbsp;<em>tensione positiva</em>&nbsp;potrebbe essere di 15 volt,</p>\r\n\r\n<p>quella&nbsp;<em>negativa</em>&nbsp;di 7 volt; la versatilit&agrave; di questi dispositivi &egrave; tale che vi possono essere applicazioni in cui la tensione negativa pu&ograve; essere posta a zero, cio&egrave; il componente &egrave; alimentato da una singola tensione (l&#39;altra &egrave; a massa). Nell&#39;alimentazione duale, il livello del segnale in uscita pu&ograve; spaziare tra i due valori di tensione d&#39;alimentazione a meno di un piccolo margine, che pu&ograve; variare a seconda del tipo di operazionale adottato.</p>\r\n\r\n<p>Dal punto di vista costruttivo, l&#39;amplificatore operazionale pu&ograve; essere realizzato con&nbsp;<a href="https://it.wikipedia.org/wiki/Transistor_a_giunzione_bipolare">transistor a giunzione bipolare</a>&nbsp;(BJT) oppure&nbsp;<a href="https://it.wikipedia.org/wiki/Transistor_ad_effetto_di_campo">transistor ad effetto di campo</a>&nbsp;(<a href="https://it.wikipedia.org/wiki/MOSFET">MOSFET</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/JFET">JFET</a>); questi ultimi lavorano a frequenze maggiori, permettono inoltre di ottenere una impedenza di ingresso pi&ugrave; elevata e un minore consumo energetico. Il&nbsp;<a href="https://it.wikipedia.org/wiki/Package_(elettronica)">package</a>&nbsp;pu&ograve; essere plastico, ceramico o metallico e pu&ograve; contenere fino a quattro dispositivi identici. Una tipologia molto particolare, progettata e commercializzata da alcuni piccoli produttori per il settore&nbsp;<a href="https://it.wikipedia.org/wiki/Audiofilia">audiofilo</a>&nbsp;fa uso di una tecnologia detta &quot;a discreti&quot;, ovvero, il circuito &egrave; realizzato con componentistica comune, assemblata comunque in una forma estremamente miniaturiz</p>\r\n\r\n<p>zata, tanto da poter essere sostituita al componente integrato originale.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>Storia</h1>\r\n\r\n<p>Il termine amplificatore operazionale &egrave; stato coniato per la prima volta negli anni &#39;40 per individuare uno speciale tipo di amplificatore che per mezzo di una scelta opportuna dei componenti esterni eseguisse una vasta gamma di operazioni. I primi amplificatori vennero realizzati tramite tubi termoionici (<a href="https://it.wikipedia.org/wiki/Valvola_termoionica">valvole</a>), i quali per&ograve; avevano ereditato dalle valvole tutti i difetti: erano molto voluminosi, consumavano molta energia, erano costosi.</p>\r\n\r\n<p>Un enorme passo avanti nella miniaturizzazione degli amplificatori operazionali si ebbe grazie all&#39;introduzione dei&nbsp;<a href="https://it.wikipedia.org/wiki/Transistor_a_giunzione_bipolare">transistori bipolari</a>.</p>\r\n\r\n<p>Tuttavia l&#39;evento decisivo per la miniaturizzazione fu lo sviluppo dei&nbsp;<a href="https://it.wikipedia.org/wiki/Circuito_integrato">circuiti integrati</a>. Il primo di questi dispositivi fu il &micro;A702 sviluppato negli anni &#39;60 da Robert J. Widlar presso la Fairchild. Nel 1968 lo stesso costruttore introdusse il popolare &micro;A741.</p>\r\n', '2015-10-30 14:26:23', 'Data/articles_images/741.jpg'),
(41, 1, 'La Legge di Faraday', 'Esponiamo questa legge fondamentale per quanto riguarda elettromagnetismo ', '<p>In&nbsp;<a href="https://it.wikipedia.org/wiki/Fisica">fisica</a>, in particolare in&nbsp;<a href="https://it.wikipedia.org/wiki/Elettromagnetismo">elettromagnetismo</a>, la&nbsp;<strong>legge di&nbsp;<a href="https://it.wikipedia.org/wiki/Michael_Faraday">Faraday</a>&nbsp;sull&#39;elettromagnetismo</strong>, anche conosciuta come&nbsp;<strong>legge dell&#39;induzione elettromagnetica</strong>,&nbsp;<strong>legge di Faraday-<a href="https://it.wikipedia.org/wiki/Franz_Ernst_Neumann">Neumann</a></strong>&nbsp;o&nbsp;<strong>legge di Faraday-<a href="https://it.wikipedia.org/wiki/Joseph_Henry">Henry</a></strong>, &egrave; una&nbsp;<a href="https://it.wikipedia.org/wiki/Legge_fisica">legge fisica</a>&nbsp;che descrive il fenomeno dell&#39;induzione elettromagnetica, che si verifica quando il&nbsp;<a href="https://it.wikipedia.org/wiki/Flusso_magnetico">flusso</a>&nbsp;del&nbsp;<a href="https://it.wikipedia.org/wiki/Campo_magnetico">campo magnetico</a>&nbsp;attraverso la superficie delimitata da un&nbsp;<a href="https://it.wikipedia.org/wiki/Circuito_elettrico">circuito elettrico</a>&nbsp;&egrave; variabile nel tempo. La legge impone che nel circuito si generi una&nbsp;<a href="https://it.wikipedia.org/wiki/Forza_elettromotrice">forza elettromotrice</a>&nbsp;indotta pari all&#39;opposto della&nbsp;<a href="https://it.wikipedia.org/wiki/Derivata">variazione temporale</a>&nbsp;del flusso.</p>\r\n\r\n<p>Talvolta &egrave; detta anche&nbsp;<strong>legge di Faraday-Neumann-<a href="https://it.wikipedia.org/wiki/Heinrich_Lenz">Lenz</a></strong>, per il fatto che la&nbsp;<em><a href="https://it.wikipedia.org/wiki/Legge_di_Lenz">legge di Lenz</a></em>&nbsp;&egrave; un suo&nbsp;<a href="https://it.wikipedia.org/wiki/Corollario">corollario</a>.<a href="https://it.wikipedia.org/wiki/Legge_di_Faraday#cite_note-1">[1]</a></p>\r\n\r\n<p>Il fenomeno dell&#39;Induzione elettromagnetica &egrave; stato scoperto e codificato in legge nel&nbsp;<a href="https://it.wikipedia.org/wiki/1831">1831</a>&nbsp;dal fisico inglese Michael Faraday ed &egrave; attualmente alla base del funzionamento dei comuni&nbsp;<a href="https://it.wikipedia.org/wiki/Motore_elettrico">motori elettrici</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Alternatore">alternatori</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Generatore_elettrico">generatori elettrici</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Trasformatore">trasformatori</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Altoparlante">altoparlanti magnetodinamici</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Testina_fonografica">testine fonografiche</a>,<a href="https://it.wikipedia.org/wiki/Microfono">microfoni dinamici</a>,&nbsp;<a href="https://it.wikipedia.org/wiki/Pick-up_(elettronica)">pick-up per chitarra magnetici</a>, etc.</p>\r\n\r\n<p>Assieme alla&nbsp;<a href="https://it.wikipedia.org/wiki/Legge_di_Amp%C3%A8re">legge di Amp&egrave;re-Maxwell</a>, a essa potenzialmente simmetrica, correla i fenomeni elettrici con quelli magnetici nel caso non stazionario: entrambe sono il punto di forza del passaggio dalle&nbsp;<a href="https://it.wikipedia.org/wiki/Equazioni_di_Maxwell">equazioni di Maxwell</a>&nbsp;al&nbsp;<a href="https://it.wikipedia.org/wiki/Campo_elettromagnetico">campo elettromagnetico</a>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Forma globale[<a href="https://it.wikipedia.org/w/index.php?title=Legge_di_Faraday&amp;veaction=edit&amp;vesection=2">modifica</a>&nbsp;|&nbsp;<a href="https://it.wikipedia.org/w/index.php?title=Legge_di_Faraday&amp;action=edit&amp;section=2">modifica wikitesto</a>]</h2>\r\n\r\n<p>La legge di Faraday afferma che la&nbsp;<a href="https://it.wikipedia.org/wiki/Forza_elettromotrice">forza elettromotrice</a>&nbsp;<img alt="Delta V" src="https://upload.wikimedia.org/math/d/e/f/def0fceff3b277a685bdb2936e614835.png" style="margin:0px" />&nbsp;indotta da un&nbsp;<a href="https://it.wikipedia.org/wiki/Campo_magnetico">campo magnetico</a>&nbsp;<img alt="mathbf B" src="https://upload.wikimedia.org/math/a/b/7/ab7a99c6a010786c60d1ce4a2f85bc25.png" style="margin:0px" />&nbsp;in una&nbsp;<a href="https://it.wikipedia.org/wiki/Linea">linea</a>chiusa&nbsp;<img alt="partial Sigma" src="https://upload.wikimedia.org/math/b/4/3/b43e90360d6338a88a1bf351c30b1385.png" style="margin:0px" />&nbsp;&egrave; pari all&#39;opposto della variazione nell&#39;unit&agrave; di tempo del&nbsp;<a href="https://it.wikipedia.org/wiki/Flusso_magnetico">flusso magnetico</a>&nbsp;<img alt="Phi_{Sigma}(mathbf B)" src="https://upload.wikimedia.org/math/a/5/5/a55c47b1df715889e0af9eb6f02ae042.png" style="margin:0px" />&nbsp;del campo attraverso la superficie&nbsp;<img alt="Sigma(t)" src="https://upload.wikimedia.org/math/6/2/0/6209b8152201eb55b6c314f4f99b0a82.png" style="margin:0px" />&nbsp;che ha quella linea come frontiera:<a href="https://it.wikipedia.org/wiki/Legge_di_Faraday#cite_note-5">[5]</a></p>\r\n\r\n<p><img alt="Delta V = -{partial Phi_{Sigma}(mathbf B) over partial t}" src="https://upload.wikimedia.org/math/3/3/1/331c4d264d21a6db8bcccaa87fb27889.png" /></p>\r\n\r\n<p>dove il&nbsp;<a href="https://it.wikipedia.org/wiki/Flusso_magnetico">flusso magnetico</a>&nbsp;&egrave; dato dall&#39;<a href="https://it.wikipedia.org/wiki/Integrale_di_superficie">integrale di superficie</a>:</p>\r\n\r\n<p><img alt=" Phi_{Sigma} = intlimits_{Sigma(t)} mathbf{B}(mathbf{r}, t) cdot d mathbf{A} " src="https://upload.wikimedia.org/math/3/1/8/318c235882c9725be77183ea2329c4f9.png" /></p>\r\n\r\n<p>con&nbsp;<img alt="dmathbf{A}" src="https://upload.wikimedia.org/math/f/6/f/f6f9a398c883cf0332e898c3004e2c3c.png" style="margin:0px" />&nbsp;elemento dell&#39;area&nbsp;<img alt="Sigma" src="https://upload.wikimedia.org/math/a/6/4/a643a0ef5974b64678111d03125054fc.png" style="margin:0px" /><span style="line-height:1.6">attraverso la quale viene calcolato il flusso. La forza elettromotrice &egrave; definita mediante il&nbsp;</span><a href="https://it.wikipedia.org/wiki/Lavoro_(fisica)" style="line-height: 1.6;">lavoro</a><span style="line-height:1.6">&nbsp;svolto dal&nbsp;</span><a href="https://it.wikipedia.org/wiki/Campo_elettrico" style="line-height: 1.6;">campo elettrico</a><span style="line-height:1.6">&nbsp;per unit&agrave; di&nbsp;</span><a href="https://it.wikipedia.org/wiki/Carica_elettrica" style="line-height: 1.6;">carica</a><span style="line-height:1.6">&nbsp;</span><img alt="q" src="https://upload.wikimedia.org/math/7/6/9/7694f4a66316e53c8cdd9d9954bd611d.png" style="line-height:1.6; margin:0px" /><span style="line-height:1.6">&nbsp;del circuito:</span></p>\r\n\r\n<p><img alt="Delta V = frac{1}{q} oint_{partial Sigma}mathbf{F}cdot doldsymbol{ell} = oint_{partial Sigma} left(mathbf{E} + mathbf{v}	imesmathbf{B}\right)cdot doldsymbol{ell}" src="https://upload.wikimedia.org/math/e/c/c/ecc12d2c40de0a4a36a8154fbadb7e18.png" /></p>\r\n\r\n<p>dove&nbsp;<img alt="partial Sigma" src="https://upload.wikimedia.org/math/b/4/3/b43e90360d6338a88a1bf351c30b1385.png" style="margin:0px" />&nbsp;&egrave; il bordo di&nbsp;<img alt="Sigma" src="https://upload.wikimedia.org/math/a/6/4/a643a0ef5974b64678111d03125054fc.png" style="margin:0px" />&nbsp;e:</p>\r\n\r\n<p><img alt="mathbf{F} = q left(mathbf{E} + mathbf{v}	imesmathbf{B}\right) " src="https://upload.wikimedia.org/math/1/1/7/117693a4a6d55502f66788d04f156c72.png" /></p>\r\n\r\n<p>&egrave; la&nbsp;<a href="https://it.wikipedia.org/wiki/Forza_di_Lorentz">forza di Lorentz</a>. Si pu&ograve; allora scrivere:<a href="https://it.wikipedia.org/wiki/Legge_di_Faraday#cite_note-6">[6]</a></p>\r\n\r\n<p><img alt="oint_{partial Sigma} mathbf{E} cdot doldsymbol{ell} = -{partial Phi_{Sigma}(mathbf B) over partial t}" src="https://upload.wikimedia.org/math/0/d/1/0d117f180179c4e0195c74c0ff947949.png" /></p>\r\n\r\n<p><img alt="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Stokes%27_Theorem.svg/220px-Stokes%27_Theorem.svg.png" style="float:right; height:218px; line-height:1.6; width:220px" /></p>\r\n\r\n<p>Il segno meno sta ad indicare che la corrente prodotta si oppone alla variazione del flusso magnetico, compatibilmente con il principio di conservazione dell&#39;energia: in altri termini, se il flusso concatenato &egrave; in diminuzione, il campo magnetico generato dalla corrente indotta sosterr&agrave; il campo originario opponendosi alla diminuzione, mentre se il flusso sta crescendo, il campo magnetico prodotto contraster&agrave; l&#39;originario, opponendosi all&#39;aumento. Questo fatto &egrave; noto anche come&nbsp;<em><a href="https://it.wikipedia.org/wiki/Legge_di_Lenz">legge di Lenz</a></em>.<a href="https://it.wikipedia.org/wiki/Legge_di_Faraday#cite_note-7">[7]</a></p>\r\n\r\n<p>Il fenomeno<span style="line-height:1.6">&egrave; perfettament</span><span style="line-height:1.6">e coerente se riferito a circuiti non deformabili, per i quali la variazione di flusso &egrave; unicamente legata alla v</span><span style="line-height:1.6">ariazione temporale del campo magnetico stesso. Nel caso vi sia un movimento relativo fra circuito e campo &egrave; possibile un approccio tramite la circuitazione indotta dalla&nbsp;</span><a href="https://it.wikipedia.org/wiki/Forza_di_Lorentz" style="line-height: 1.6;">forza di Lorentz</a><span style="line-height:1.6">, dovuta alle cariche del circuito in moto all&#39;interno di un campo magnetico. Si pu&ograve; dimostrare infatti che il primo approccio </span></p>\r\n\r\n<p><span style="line-height:1.6">e il secondo sono equivalenti.</span></p>\r\n', '2015-10-30 12:38:44', 'Data/articles_images/m1_u314.gif'),
(64, 1, 'articolo 5', 'articolo 5', '', '2015-11-06 12:00:32', 'Data/articles_images/default_article_image.jpg'),
(65, 1, 'articolo 6 ', 'articolo 6', '', '2015-11-06 12:00:48', 'Data/articles_images/default_article_image.jpg'),
(66, 1, 'articolo 7', 'articolo 7', '', '2015-11-06 12:01:08', 'Data/articles_images/default_article_image.jpg'),
(67, 1, 'articolo 8', 'articolo 8', '', '2015-11-06 12:01:19', 'Data/articles_images/default_article_image.jpg'),
(68, 1, 'articolo 9', 'articolo 9', '', '2015-11-06 12:01:29', 'Data/articles_images/default_article_image.jpg'),
(69, 1, 'articolo 10', 'articolo 10', '', '2015-11-06 12:01:35', 'Data/articles_images/default_article_image.jpg'),
(70, 1, 'articolo 11', 'articolo 11', '', '2015-11-06 12:01:42', 'Data/articles_images/default_article_image.jpg'),
(71, 1, 'articolo 12', 'articolo 12', '', '2015-11-06 12:01:52', 'Data/articles_images/default_article_image.jpg'),
(72, 1, 'articolo 13', 'articolo 13', '', '2015-11-06 12:01:58', 'Data/articles_images/default_article_image.jpg'),
(73, 1, 'articolo 14', 'articolo 14', '', '2015-11-06 12:02:07', 'Data/articles_images/default_article_image.jpg'),
(74, 1, 'articolo 15', 'fewafeawfewijfo', '<p>iji</p>\r\n', '2015-11-07 10:54:45', 'Data/articles_images/thumbcrop (1).jpg'),
(75, 1, 'articolo 16', 'fewfewafewafeawf', '<p>eawfewfewfewf</p>\r\n', '2015-11-07 10:54:55', 'Data/articles_images/thumbcrop (2).jpg'),
(76, 1, 'articolo 17', 'fewfewafewfewfewa', '<p>fewafewfewfew</p>\r\n', '2015-11-07 10:55:04', 'Data/articles_images/thumbcrop (3).jpg'),
(77, 1, 'articolo 18', 'ewfewafwefew', '<p>fewfewfewafwafew</p>\r\n', '2015-11-07 10:55:14', 'Data/articles_images/thumbcrop (4).jpg'),
(78, 1, 'articolo 19', 'ewfewfewfewfewfew', '<p>fewfewfewfewafew</p>\r\n', '2015-11-07 10:55:25', 'Data/articles_images/thumbcrop (5).jpg'),
(80, 1, 'articolo 21', 'ewfewfewfewfewf', '<p>fewafewfewfewaf</p>\r\n', '2015-11-07 10:55:45', 'Data/articles_images/transistor.gif'),
(81, 1, 'prova titolo', 'prova descrizione', '<p>fewafewfwae</p>\r\n', '2015-11-10 17:34:25', 'Data/articles_images/thumbcrop (8).jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAuthor` int(11) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAuthor` (`idAuthor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dump dei dati per la tabella `comment`
--

INSERT INTO `comment` (`id`, `idAuthor`, `text`, `date`) VALUES
(3, 1, 'testo', '2015-10-10 00:00:00'),
(16, 1, 'fafsfs', '2015-10-06 00:00:00'),
(17, 1, 'jioasjodisa', '2015-10-06 00:00:00'),
(18, 1, 'jioasjodisadff', '2015-10-10 00:00:00'),
(38, 1, 'ancora un commento', '2015-11-01 00:00:00'),
(45, 10, 'commento progetto 1', '2015-11-01 00:00:00'),
(51, 1, 'prova', '2015-11-01 16:13:11'),
(52, 1, 'ancora', '2015-11-01 16:13:14'),
(57, 1, 'PROVA COMMENTO', '2015-11-03 16:40:18'),
(58, 10, 'fwe', '2015-11-03 17:39:01'),
(60, 10, 'efwa', '2015-11-03 17:43:50'),
(61, 10, 'fads', '2015-11-03 17:45:19'),
(67, 10, 'fewafe', '2015-11-03 18:15:04'),
(68, 10, 'dew', '2015-11-07 12:46:29'),
(69, 10, 'dew', '2015-11-07 12:46:32'),
(70, 1, 'fefwe', '2015-11-10 16:51:08'),
(71, 10, 'prova', '2015-11-10 17:25:43'),
(72, 1, 'fweafefeaw', '2015-11-10 17:33:55');

-- --------------------------------------------------------

--
-- Struttura della tabella `comments_articles`
--

CREATE TABLE IF NOT EXISTS `comments_articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idComment` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idComment` (`idComment`),
  KEY `idArticle` (`idArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dump dei dati per la tabella `comments_articles`
--

INSERT INTO `comments_articles` (`id`, `idComment`, `idArticle`) VALUES
(3, 3, 2),
(4, 16, 1),
(5, 17, 1),
(6, 18, 1),
(35, 57, 1),
(43, 67, 1),
(44, 68, 80),
(45, 69, 80),
(46, 71, 65),
(47, 72, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `comments_projects`
--

CREATE TABLE IF NOT EXISTS `comments_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idComment` int(11) NOT NULL,
  `idProject` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idComment` (`idComment`),
  KEY `idProject` (`idProject`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dump dei dati per la tabella `comments_projects`
--

INSERT INTO `comments_projects` (`id`, `idComment`, `idProject`) VALUES
(1, 70, 34);

-- --------------------------------------------------------

--
-- Struttura della tabella `dependency`
--

CREATE TABLE IF NOT EXISTS `dependency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProject` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProject` (`idProject`),
  KEY `idArticle` (`idArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dump dei dati per la tabella `dependency`
--

INSERT INTO `dependency` (`id`, `idProject`, `idArticle`) VALUES
(36, 34, 1),
(37, 34, 2),
(39, 35, 80),
(40, 36, 1),
(41, 36, 2),
(42, 36, 3),
(43, 37, 76),
(44, 37, 77);

-- --------------------------------------------------------

--
-- Struttura della tabella `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `perm_desc` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dump dei dati per la tabella `permissions`
--

INSERT INTO `permissions` (`id`, `perm_desc`) VALUES
(1, 'getDashboardPage'),
(2, 'getStatisticsPage'),
(3, 'getProfilePage'),
(4, 'getUsersPage'),
(5, 'getArticleWritingPage'),
(6, 'getProjectWritingPage'),
(7, 'getUserComments'),
(8, 'getJobsPage'),
(9, 'getArticlesStatistics'),
(10, 'getCommentsStatistics'),
(11, 'getProjectsStatistics');

-- --------------------------------------------------------

--
-- Struttura della tabella `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAuthor` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(64) NOT NULL,
  `text` longtext NOT NULL,
  `date` datetime NOT NULL,
  `projectImage` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idAuthor` (`idAuthor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dump dei dati per la tabella `project`
--

INSERT INTO `project` (`id`, `idAuthor`, `title`, `description`, `text`, `date`, `projectImage`) VALUES
(34, 1, 'prova progetto', 'prova ancora', '<p>fjiewofwa</p>\r\n', '2015-11-07 12:47:17', 'Data/projects_images/transistor.gif'),
(35, 1, 'prova progetto', 'prova descrizione', '<p>fwefwefwefew</p>\r\n', '2015-11-10 16:48:31', 'Data/projects_images/default_project_image.jpg'),
(36, 1, 'prova titolo', 'prova descrizione', '<p>fwefwfew</p>\r\n', '2015-11-10 16:51:42', 'Data/projects_images/thumbcrop (9).jpg'),
(37, 1, 'prova titotlo', 'fjieojfiowewe', '<p>fewfewafawfwaefwa</p>\r\n', '2015-11-10 17:18:19', 'Data/projects_images/few.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dump dei dati per la tabella `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'administrator'),
(2, 'normal_user'),
(3, 'writer_user');

-- --------------------------------------------------------

--
-- Struttura della tabella `role_perm`
--

CREATE TABLE IF NOT EXISTS `role_perm` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `perm_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `perm_id` (`perm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dump dei dati per la tabella `role_perm`
--

INSERT INTO `role_perm` (`id`, `role_id`, `perm_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(6, 3, 5),
(7, 3, 6),
(8, 3, 3),
(9, 2, 3),
(10, 1, 7),
(11, 2, 7),
(12, 3, 7),
(13, 1, 8),
(14, 1, 9),
(15, 1, 10),
(16, 1, 11);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `profileImage` varchar(64) NOT NULL,
  `role` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role` (`role`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `profileImage`, `role`) VALUES
(1, 'NetRider', 'prova', 'netrider@gmail.com', 'Data/profile_images/avatar.jpg', 3),
(10, 'Cristian', 'prova', 'stan_cristinel@htadel.com', 'Data/profile_images/default_profile_image.gif', 1),
(12, 'prova', 'prova', 'prova@gmail.com', 'Data/profile_images/default_profile_image.gif', 2);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limiti per la tabella `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `comments_articles`
--
ALTER TABLE `comments_articles`
  ADD CONSTRAINT `comments_articles_ibfk_1` FOREIGN KEY (`idComment`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_articles_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `comments_projects`
--
ALTER TABLE `comments_projects`
  ADD CONSTRAINT `comments_projects_ibfk_1` FOREIGN KEY (`idComment`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_projects_ibfk_2` FOREIGN KEY (`idProject`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `dependency`
--
ALTER TABLE `dependency`
  ADD CONSTRAINT `dependency_ibfk_1` FOREIGN KEY (`idProject`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dependency_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`idAuthor`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `role_perm`
--
ALTER TABLE `role_perm`
  ADD CONSTRAINT `role_perm_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `role_perm_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`id`);

--
-- Limiti per la tabella `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
