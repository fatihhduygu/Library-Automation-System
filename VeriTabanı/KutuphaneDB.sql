-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 18, 2019 at 10:53 AM
-- Server version: 5.6.33
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kutuphane`
--
CREATE DATABASE IF NOT EXISTS `kutuphane` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kutuphane`;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `Id` int(11) NOT NULL,
  `Adi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`Id`, `Adi`) VALUES
(1, 'Kitap'),
(2, 'Edebiyat'),
(3, 'Çocuk ve Gençlik'),
(4, 'Eğitim'),
(5, 'Araştırma-Tarih'),
(6, 'Din-Mitoloji'),
(7, 'Foreign Languages'),
(8, 'Sanat-Tasarım'),
(9, 'Felsefe'),
(10, 'Hobi'),
(11, 'Çizgi Roman'),
(12, 'Bilim'),
(13, 'Mizah'),
(14, 'Prestij Kitapları'),
(15, 'Spor'),
(16, 'Diğer');

-- --------------------------------------------------------

--
-- Table structure for table `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `Adi` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Sayfa_Sayisi` int(11) NOT NULL,
  `Yayin_Tarihi` date NOT NULL,
  `ISBN` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `YayinEvi_Id` int(11) NOT NULL,
  `Yazar_Id` int(11) NOT NULL,
  `Kategori_Id` int(11) NOT NULL,
  `Kutuphane_Id` int(11) NOT NULL,
  `resim` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `icerik` varchar(1000) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `LC` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `Adi`, `Sayfa_Sayisi`, `Yayin_Tarihi`, `ISBN`, `YayinEvi_Id`, `Yazar_Id`, `Kategori_Id`, `Kutuphane_Id`, `resim`, `icerik`, `LC`) VALUES
(1, '1984', 250, '1984-03-01', 'ISBN 978', 4, 1, 2, 1, '1.jpg', 'İngiliz yazar George Orwellin 1949 yilinda yayimlanan ve kisa surede kult mertebesine erismis eseri 1984, 1949 yilinda yayimlanmistir. Distopya turunde bir roman olan 1984, Buyuk Birader, Dusunce Polisi, 101 Numarali Oda, 2+2=5 gibi cesitli terminolojileri ve kavramlari gunumuz lugatina dahil etmistir. George Orwell kitaplari arasinda en cok bilinen eserdir.\r\n\r\nRomanin adi Avrupadaki Son Adam ismiyle yayimlanmak istenmistir fakat Orwellin yayincisi basarili bir pazarlama stratejisiyle kitabin adini Bin Dokuz Yuz Seksen Dort olarak degistirmistir.\r\n\r\nRoman, II. Dunya Savasindan sonra olusan totaliter rejimlere agir bir elestiri niteligindedir ve romandaki alegoriler ve semboller bu totaliter devletleri isaret etmektedir.\r\n\r\nGeorge Orwell 1984 kitap ozeti kisaca belirtilmek gerekirse romanin dunyası uc ayri rejimle yonetilmektedir', 'DR401'),
(3, 'C++ ile Algoritmalar ve Programcilik', 400, '2018-04-24', 'ISBN 123', 7, 5, 1, 1, '2.jpg', 'Bu kitap hic C++/C bilmeyip ogrenmek isteyen veya var olan C++/C bilgisini gelistirmek isteyenler icin yazilmistir. Kitap ozellikle okullarda, kurslarda, meslek liselerinde, yuksekokullarda ve ozellikle universitelerin yonetim bilisim sistemleri, bilgisayar programciligi, bilgisayar ve ogretim teknolojileri ogretmenligi bolumlerinde C++/C ile programciliga yeni baslayanlar duşunulerek hazirlanmiştir. Ozellikle programciliga yeni baslayanlarin zorlandigi bazi konularda bolca ornek kod yazilarak konularin daha basit ve anlasilir olmasi saglanmistir. Bolum sonlarindaki uygulamalar ile konularin iyice pekistirilmesi amaclanmistir. Kitap ayrica egitim videolariyla desteklenmiştir.', 'G155'),
(4, 'Otomatik Portakal', 400, '2016-08-23', 'ISBN 625', 9, 11, 9, 1, '3.jpg', 'Tüm hayvanların en zekisi, iyiliğin ne demek olduğunu bilen insanoğluna sistematik bir baskı uygulayarak onu otomatik işleyen bir makine haline getirenlere kılıç kadar keskin olan kalemimle saldırmaktan başka hiçbir şey yapamıyorum...\r\n\r\nCockney dilinde (İngiliz argosu) bir deyiş vardır. "Uqueer as as clockwork orange". Bu deyiş, olabilecek en yüksek derecede gariplikleri barındıran kişi anlamına gelir. Bu çok sevdiğim lafı, yıllarca bir kitap başlığında kullanmayı düşünmüşümdür. Bir de tabii Malezya\'da "canlı" anlamına gelen "orang" sözcüğü var. Kitabı yazmaya başladığımda, rengi ve hoş bir kokusu olan bir meyvenin kullanıldığı bu deyişin, tam da benim anlatmak istediğim duruma, Pavlov kanunlarının uygulanmasına dayalı bir hikâyeye çok iyi oturduğunu düşündüm...\r\n\r\n-Anthony Burges-\r\n\r\nKarabasan gibi bir gelecek atmosferi... Geceleyin sokaklara dehşet saçan, yaşamları şiddet üzerine kurulu gençler... Sosyal kehanet? Kara mizah? Özgür iradenin irdelenişi?.. Otomatik Portakal bunların he', 'LC455'),
(5, 'Cesur Yeni Dünya', 250, '2016-08-23', 'ISBN 555', 7, 4, 12, 1, '4.jpg', '"Cesur Yeni Dünya" bizi "Ford\'dan sonra 632 yılına" götürür. Bu dünyanın cesur insanları kapısında "Cemaat, Özdeşlik, İstikrar" yazan Londra Merkez Kuluçka ve Şartlandırma Merkezi\'nde üretilirler. Kadınların döllenmesi yasak ve ayıp olduğu için, "annelik\' ve \'babalık\' pornografik birer kavram olarak görülür Toplumsal istikrarın temel güvencesi olan şartlandırma hipnopedya -uykuda eğitim- ile sağlanır. Hipnopedya sayesinde herkes mutludur; herkes çalışır ve herkes eğlenir. "Herkes herkes içindir."\r\n\r\n"Cesur Yeni Dünya"nın önemi yalnızca ardılları için bir standart oluşturması ve karamsar bir gelecek tasarımının güçlü betimlemesiyle değil, aynı zamanda \'birey yok edilse de süren macerasının\' sağlam bir üslupta anlatılmasıyla da ilgili. Huxley, yapıtını ütopa geleneğinin kuru anlatımının dışına çıkarıp \'iyi edebiyat\' kategorisine yükseltiyor.', 'A321'),
(6, 'Olağanüstü Bir Gece', 550, '2016-08-23', 'ISBN 852', 2, 3, 15, 1, '5.jpg', 'Olağanüstü Bir Gece, seçkin bir burjuva olarak rahat ve tasasız varoluşunu sürdürürken giderek duyarsızlaşan bir adamın hayatındaki dönüştürücü deneyimin hikâyesidir. Sıradan bir Pazar gününü at yarışlarında geçirirken, belki de ilk kez burjuva ahlakından saparak "suç" işler. Böylece yeniden "hissetmeye" başladığını, kötücül ve ateşli hazları olan gerçek bir insan olduğunu fark eder. İçindeki haz dolu esrime, aynı günün akşamında onu gece âleminin son atıklarının arasına, "hayatın en dibindeki lağımlara" sürükleyecek, varış noktası ise ruhani bir uyanış olacaktır. ', 'BS402'),
(7, 'Sineklerin Tanrısı', 100, '2016-08-23', 'ISBN 741', 7, 11, 6, 1, '6.jpg', '"Sineklerin Tanrısı", günümüzde bir atom savaşı sırasında, ıssız bir adaya düşen bir avuç okul çocuğunun, geldikleri dünyanın bütün uygar törelerinden uzaklaşarak, insan yaradılışının temelindeki korkunç bir gerçeği ortaya koymalarını dile getirir. Konusu, R. M. Ballantyne\'ın Mercan Adası gibi eşsiz bir mercan adasının cenneti andıran ortamında başlayan bu roman, çağdaş toplumlardaki çöküntünün, insan yaradılışındaki köklerini gözönüne sermek amacıyla Mercan Adası\'ndaki duygusal iyimserlikten apayrı bir yönde gelişir. Uygar insanın yüreğinde gizlenen karanlığı deşerken "Sineklerin Tanrısı"; daha çok Conrad\'ın kısa romanı "Karanlığın Yüreği"ni andırır. Golding\'in romanındaki çocuklar da başlangıçta tıpkı Kurtz gibi, uygar toplumun baskılarından uzak bir örnek düzen kurmak isterlerken, gitgide hayvanlaşır, korkunç bir kişiliğe bürünürler. Bu yönüyle Sineklerin Tanrısı\'nın Mercan Adası ile öbür ıssız ada serüvenlerinden ayrıldığı en önemli nokta, ıssız ada yaşamının çetin güçlüklerini ya ', 'HA182'),
(8, 'Satranç', 220, '2016-08-23', 'ISBN 456', 4, 6, 3, 1, '7.jpg', 'Stefan Zweig, çok geniş bir psikoloji birikimini eserlerinde bütünüyle kullanmış ender yazarlardandır. Onun dünya edebiyatında bir biyografi yazarı olarak kazandığı haklı ünün temelinde de bu özelliği, yani yazarlığının yanı sıra çok usta bir psikolog olması yatar.\r\n\r\nSatranç, Zweig\'ın psikolojik birikimini bütünüyle devreye soktuğu bir öyküdür ve bu öykünün baş kişileri, tamamen yazarın biyografilerinde ele aldığı kişileri işleyiş biçimiyle sergilenmiştir.\r\n\r\nZweig ölümünden hemen önce tamamladığı birkaç düzyazı metinden biri olan Satranç\'ı kaleme aldığı sırada, karısı Lotte Zweig ile birlikte göç ettiği Brezilya\'da yaşamaktaydı. Satranç\'ta da, olay yeri olarak New York\'dan Buenos Aires\'e gitmekte olan bir yolcu gemisini seçmiştir. Bu gemide tamamen rastlantı sonucu karşılaşan üç kişi: yeni dünya satranç şampiyonu Mirko Czentovic, sıradan bir satranç oyuncusu olan anlatıcı ve bir zamanlar çok usta bir satranç oyuncusu olan, ama hayli zamandır satrançtan uzak kalmış bulunan Dr. B., öyk', 'TA105'),
(9, 'Çavdar Tarlasında Çocuklar', 125, '2016-08-23', 'ISBN 789', 2, 8, 2, 1, '8.jpg', 'Pek çok insanın hakkında konuştuğum için üzgünüm. Bildiğim tek şey; size anlattığım herkesi biraz özlüyorum. Bizim Stradlater\'ı ve Ackley\'i bile, sözgelimi. Sanırım o lanet Maurice\'i bile özlüyorum. Sakın kimseye bir şey anlatmayın. Herkesi özlemeye başlıyorsunuz sonra.\r\n\r\nÇavdar Tarlasında Çocuklar, Salinger\'ın tek romanı. Ergenlik çağının içinde, yetişkin dünyanın düzenine karşı isyankar bir çocuğun, bir Noel öncesi başına gelenler... Bu sürecin bir psikiyatri kliniğinde noktalanışı. Holden Caulfield\'in masumiyet arayışının iç burkucu romanı. Belki de Salinger\'ın.\r\n\r\n1993\'te Franny ve Zoey ile Dokuz Öykü adlı kitaplarını yayımladığımız Salinger, 1963\'ten bu yana yeni bir yapıt yayımlamamasına ve neredeyse efsane haline gelmiş bir gizlilik içinde yaşamasına karşın, dünya edebiyat gündemindeki yerini hep koruyor.', 'TX901'),
(10, 'İstanbul\'un Gizli Tarihi', 256, '2018-12-13', 'ISBN 753', 2, 4, 5, 1, '9.jpg', 'Mesih beklentisi içinde olanlar dünyayı nasıl şekillendiriyor?\r\n\r\nKıyamet Bekçileri’ne göre Kutsal Kan İstanbul’a nasıl geldi?\r\n\r\nKehanetlerde Türkiye neden bu kadar önemli?\r\n\r\nTürkiye’yi ele geçirme planlarını kehanetlere nasıl dayandırıyorlar?\r\n\r\nŞövalyeler ve Papalık Osmanlı üzerinde hangi gizli planları kurdu? İşbirlikçileri nasıl kullandılar?\r\n\r\nOsmanlı’nın ilk masonları kimlerdi?\r\n\r\nMason locaları nasıl kuruldu?\r\n\r\nFinansal kirli oyunun gizli tarihinde neler var?\r\n\r\nRothschild parası Osmanlı topraklarına nasıl geldi?\r\n\r\nOsmanlı’yı paylaşma planında Amerika ne kadar etkili oldu?\r\n\r\nİstanbul beş yıl boyunca nasıl işgal altında kaldı, neler yaşandı?\r\n\r\nİşgalciler, içeride kimlerle anlaştılar?', 'TX645'),
(11, 'Hey Garson!', 104, '2018-12-22', 'ISBN 549', 9, 11, 2, 1, '10.jpg', 'Hey Garson! çok ilginç, komik, acıklı ve şaşırtıcı… birbirine bağlanan hikayelerden oluşuyor.\r\n\r\n \r\n\r\n20’li yaşlarda bir gencin Londra’da garsonluk yaparken başından geçenler anlatılıyor bu kitapta.\r\n\r\n \r\n\r\nKeçiörenli bir gurbetçi ile Tom Cruise’u, temizlik hastası Alman ev hanımı ile Robert Fisk’i, Türk kadın şarkıcı ile Anthony Hopkins’i buluşturuyor Hey Garson!\r\n\r\n \r\n\r\nDaha ilginci… gündelik insan ilişkileri içinde eşitlik, tahakküm, görgü, kültürel çatışmalar, sınıfsal farklar… gibi meseleleri açığa vuruyor.\r\n\r\n \r\n\r\nAnayasa hukuku alanında çalışan siyaset bilimci Murat Sevinç’in bugünden geçmişe bakarak anlattıkları çok samimi, eğlenceli ve ufuk açıcı.\r\n\r\nGayet leziz ve doyurucu. Tadını çıkarın!\r\n\r\n \r\n\r\nMurat Sevinç anılarını anlatırken iyi insan olmanın yollarını gösteriyor ve uygarlık dersi veriyor.\r\n\r\n-VEDAT MİLOR-\r\n\r\n \r\n\r\nŞimdi masanıza oturun, sırtınızı sandalyenize bir güzel yaslayın, menüyü, pardon, kitabı açın ve vaktiyle anayasa hukukçusu olduğu rivayet edilen şahane bir y', 'TL341');

-- --------------------------------------------------------

--
-- Table structure for table `kutuphane`
--

CREATE TABLE `kutuphane` (
  `Id` int(11) NOT NULL,
  `Ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Adres` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kutuphane`
--

INSERT INTO `kutuphane` (`Id`, `Ad`, `Tel`, `Email`, `Adres`) VALUES
(1, 'Milli Kütüphane', '05437681454', 'millikutuphane.hotmail.com', 'Osmanlı mahallesi polat sokak 37/11');

-- --------------------------------------------------------

--
-- Table structure for table `odunc`
--

CREATE TABLE `odunc` (
  `UyeId` int(11) NOT NULL,
  `KitapId` int(11) NOT NULL,
  `OduncTarihi` date NOT NULL,
  `TeslimTarihi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `Id` int(11) NOT NULL,
  `Adi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Soyadi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Tc` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Dogum_Tarihi` date NOT NULL,
  `Cinsiyet` tinyint(1) NOT NULL,
  `Tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Kimlik` tinyint(1) NOT NULL,
  `kutuphaneId` int(11) NOT NULL,
  `Adres` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(20) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`Id`, `Adi`, `Soyadi`, `Tc`, `Dogum_Tarihi`, `Cinsiyet`, `Tel`, `Email`, `Kimlik`, `kutuphaneId`, `Adres`, `sifre`) VALUES
(1, 'Fatih', 'Duygu', '46909887168', '1997-08-24', 1, '05437681454', 'fatih_duygu@hotmail.com', 1, 1, 'Osmanlı Mahallesi Polat Sokak 37/11 Bedir Sitesi H.Blok', '753'),
(2, 'Muhammed', 'Yazici', '15123698745', '1197-12-13', 1, '05326589745', 'muhammed_yazici@hotmail.com', 0, 1, 'Osmanlı Mahallesi Polat Sokak 37/11 Bedir Sitesi H.Blok', '123456'),
(3, 'Ahmet', 'Öztürk', '45698745632', '1997-04-20', 1, '05479856231', 'ahmet_ozturk@hotmail.com', 1, 1, 'Osmanlı Mahallesi Polat Sokak 37/11 Bedir Sitesi H.Blok', '123456789'),
(4, 'Zeynep ', 'Duygu', '8564928531', '2003-02-04', 0, '05317983294', 'zeynep_duygu@hotmail.com', 0, 1, 'Osmanlı Mahallesi Polat Sokak 37/11 Bedir Sitesi H.Blok', '8520'),
(14, 'Muhammed Fatih', 'Çolak', '46985203256', '1997-06-17', 1, '05489563215', 'admin@admin.com', 0, 1, 'Kadı Burhanettin Mahallesi No 91-B , Halil Rıfat Paşa Cd., 58030 Sivas', 'admin'),
(19, 'kerim', 'yılmaz', '46909884565', '2015-09-29', 1, '05437681454', 'anonim', 0, 1, 'Kadı Burhanettin Mahallesi No 91-B , Halil Rıfat Paşa Cd., 58030 Sivas', '123'),
(20, 'fero', 'Apo', '123456789', '2021-02-02', 1, '05437681453', 'apo@hotmail.com', 0, 1, 'dkwejelkqwjewjwqbejkqwhejqweklhqwejlwqHEJQKHEWHQEJLH"', '123');

-- --------------------------------------------------------

--
-- Table structure for table `yayinevi`
--

CREATE TABLE `yayinevi` (
  `Id` int(11) NOT NULL,
  `Adi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Email` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Adres` varchar(150) NOT NULL,
  `Domain` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yayinevi`
--

INSERT INTO `yayinevi` (`Id`, `Adi`, `Tel`, `Email`, `Adres`, `Domain`) VALUES
(1, 'Can Sanat Yayinlari', '05437681454', 'can_yayinlari.org', 'Osmanlı Mahallesi Polat Sokak 37/11 Bedir Sitesi H.Blok', 'canyayinlari.org'),
(2, 'Adımlar Yayınevi', '03462222842', 'adimlaryayinevi@hotmail.com', ' Eskikale Mahallesi, Sirer Cad. Çitil Apt. D:4, 58070 Sivas Merkez/Sivas', 'adimlaryayinevi.com'),
(4, 'Nokta Kitap YayinEvi', '03462247165', 'noktakitap@hotmail.com', 'Cami-i Kebir Mahallesi, İhramcızade Cad. 35/B, 58070 Sivas Merkez/Sivas', 'noktakitap.com'),
(6, 'Elma Yayınevi', '03124177273', 'elmayayin@hotmail.com', 'Aziziye Mahallesi, Portakal Çiçeği Sk. No:37, 06690 Çankaya/Ankara', 'elmayayin.com'),
(7, 'Yargı Yayınevi', '03123861321', 'yargiyayin@hotmail.com', 'Ostim Mahallesi, Turan Çiğdem Cd. 36/3, 06105 Ostim Osb/Yenimahalle/Ankara', 'yargiyayin.com'),
(9, 'Nüans Yayınevi', '03124198096', 'nüansyayin@hotmail.com', 'Mustafa Kemal Mahallesi, 2157. Sk. No:12-A, 06530 Çankaya/Ankara', 'nüansyayin.com'),
(11, 'Türkiye Diyanet Vakfı Yayın Ev', '05312569874', 'diyanetyayin@hotmail.com', 'Osmanlı Mahallesi Polat Sokak 37/11 Bedir Sitesi H.Blok', 'diyanetyayin.com');

-- --------------------------------------------------------

--
-- Table structure for table `yazarlar`
--

CREATE TABLE `yazarlar` (
  `Id` int(11) NOT NULL,
  `Adi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `Soyadi` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `yazarlar`
--

INSERT INTO `yazarlar` (`Id`, `Adi`, `Soyadi`) VALUES
(1, 'George', 'Orwell'),
(3, 'Aziz', 'Nesin'),
(4, 'Kemal ', 'Tahir'),
(5, 'Nurullah  ', 'Ataç'),
(6, 'Azra', 'Kohen'),
(8, 'İpek', 'Ongun'),
(9, 'Ömer', 'Seyfettin'),
(11, 'Charles ', 'Dickens'),
(14, 'Murat ', 'Sevinç');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Kategori_Id` (`Kategori_Id`),
  ADD KEY `Yazar_Id` (`Yazar_Id`),
  ADD KEY `YayinEvi_Id` (`YayinEvi_Id`),
  ADD KEY `Kutuphane_Id` (`Kutuphane_Id`);

--
-- Indexes for table `kutuphane`
--
ALTER TABLE `kutuphane`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `odunc`
--
ALTER TABLE `odunc`
  ADD KEY `KitapId` (`KitapId`),
  ADD KEY `UyeId` (`UyeId`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `kutuphaneId` (`kutuphaneId`);

--
-- Indexes for table `yayinevi`
--
ALTER TABLE `yayinevi`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kutuphane`
--
ALTER TABLE `kutuphane`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `yayinevi`
--
ALTER TABLE `yayinevi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD CONSTRAINT `kitaplar_ibfk_1` FOREIGN KEY (`Kategori_Id`) REFERENCES `kategori` (`Id`),
  ADD CONSTRAINT `kitaplar_ibfk_2` FOREIGN KEY (`Yazar_Id`) REFERENCES `yazarlar` (`Id`),
  ADD CONSTRAINT `kitaplar_ibfk_3` FOREIGN KEY (`YayinEvi_Id`) REFERENCES `yayinevi` (`Id`),
  ADD CONSTRAINT `kitaplar_ibfk_4` FOREIGN KEY (`Kutuphane_Id`) REFERENCES `kutuphane` (`Id`);

--
-- Constraints for table `odunc`
--
ALTER TABLE `odunc`
  ADD CONSTRAINT `odunc_ibfk_1` FOREIGN KEY (`KitapId`) REFERENCES `kitaplar` (`id`),
  ADD CONSTRAINT `odunc_ibfk_2` FOREIGN KEY (`UyeId`) REFERENCES `uyeler` (`Id`);

--
-- Constraints for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD CONSTRAINT `uyeler_ibfk_1` FOREIGN KEY (`kutuphaneId`) REFERENCES `kutuphane` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
