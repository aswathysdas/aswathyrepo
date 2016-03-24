-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2016 at 07:35 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobilestore`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_category`(in categry_nm varchar(20))
begin
insert into tbl_category(vchr_category_nm) 
values(categry_nm);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_del_cat`(in id int)
begin
declare done int default 0;
declare exit handler for sqlexception,sqlwarning set done=1;

START TRANSACTION;
delete from tbl_category where pk_int_category_id=id;
delete from tbl_sub_category where fk_int_category_id=id;
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_del_product`(in id int)
begin
delete from tbl_product where pk_int_prdct_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_del_subcat`(in id int)
begin
delete from tbl_sub_category where pk_int_sub_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_insert_purchase`(in fk_int_product_id int,in qty int,in amount int,in fk_int_reg_id int)
begin
declare done int default 0;
declare amt int;
declare dat date default CURDATE();
declare exit handler for sqlexception,sqlwarning set done=1;

START TRANSACTION;

set dat=CURDATE();
set amt=amount*qty;
insert into tbl_purchase(fk_int_product_id,int_quantity,int_total_amount,dat_date,fk_int_login_id) values (fk_int_product_id,qty,amt,dat,fk_int_reg_id);

update tbl_stock set int_quantity=int_quantity-qty where fk_int_prdct_id=fk_int_product_id;
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_insert_sub_category`(in vchr_sub_name varchar(30),in fk_int_cat_id int)
begin
insert into tbl_sub_category(vchr_sub_categry_nm,fk_int_category_id) values (vchr_sub_name,fk_int_cat_id);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_prdct_updt`(in prdct_id int(11),in prdct_nm varchar(20),in price int(11),in descrptn varchar(20),in qty int(11))
begin
declare done int default 0;
declare exit handler for sqlexception,sqlwarning set done=1;

START TRANSACTION;
update tbl_product set vchr_prdct_nm=prdct_nm,int_price=price,vchr_desc=descrptn
where pk_int_prdct_id=prdct_id;
update tbl_stock set int_quantity=qty where fk_int_prdct_id=prdct_id;
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_product`(IN `prdctnm` VARCHAR(100), IN `price` INT, IN `descrptn` VARCHAR(500), IN `quantity` INT(11), IN `fk_sub_id` INT(11), IN `selprice` INT(11), IN `prdctimg` VARCHAR(30), IN `sideview` VARCHAR(30))
begin
declare done int default 0;
declare k int;
declare exit handler for sqlexception,sqlwarning set done=1;

START TRANSACTION;
insert into tbl_product(vchr_prdct_nm,int_price,vchr_desc,fk_int_sub_id,int_sell_price,vchr_product_img,vchr_product_side_view) 
values(prdctnm,price,descrptn,fk_sub_id,selprice,prdctimg,sideview);

set k=(select last_insert_id());

insert into tbl_stock(fk_int_prdct_id,int_quantity) values (k,quantity);
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_reg_log`(in email varchar(30),in pasword varchar(30),in fnm varchar(30),in lnm varchar(30),in addrs varchar(50),in pincode int(11),in mbnum varchar(20))
begin
declare done int default 0;
declare id int;
declare stat varchar(30) default 'active';
declare dt date default CURDATE();
declare exit handler for sqlexception,sqlwarning set done=1;

START TRANSACTION;
insert into tbl_login(vchr_email,vchr_password,fk_int_user_role_id) values(email,pasword,2);
set id=(select last_insert_id());
set dt=CURDATE();
insert into tbl_registration(vchr_fname,vchr_lname,vchr_address,int_pincode,vchr_mobilenum,fk_int_login_id,dat_date,vchr_status) 
values(fnm,lnm,addrs,pincode,mbnum,id,dt,stat);
if done=0 then
COMMIT;
else
ROLLBACK;
end if;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_slct`(in id int)
begin
select * from tbl_sub_category where fk_int_category_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_slct_sub_cat`(in id int)
begin
select vchr_sub_categry_nm from tbl_sub_category join tbl_category on pk_int_category_id=fk_int_category_id where pk_int_category_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_sub_categry`(in sub_id int(11),in ctgry_nm varchar(20))
begin
update tbl_sub_category set vchr_sub_categry_nm=ctgry_nm where pk_int_sub_id=sub_id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_susp`(in id int)
begin
update tbl_registration set vchr_status='Inactive' where pk_int_reg_id=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `csp_updt_categry`(in ctgry_id int(11),in ctgry_nm varchar(20))
begin 
update tbl_category set vchr_category_nm=ctgry_nm where pk_int_category_id=ctgry_id;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `pk_int_category_id` int(15) NOT NULL AUTO_INCREMENT,
  `vchr_category_nm` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`pk_int_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`pk_int_category_id`, `vchr_category_nm`) VALUES
(1, 'Mobiles'),
(2, 'Mobile Accessories'),
(3, 'Headset and earphone'),
(4, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE IF NOT EXISTS `tbl_login` (
  `pk_int_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_email` varchar(30) NOT NULL,
  `vchr_password` varchar(30) NOT NULL,
  `fk_int_user_role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_int_login_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`pk_int_login_id`, `vchr_email`, `vchr_password`, `fk_int_user_role_id`) VALUES
(1, 'nehaabdulla@gmail.com', 'neha', 1),
(2, 'nasla@gmail.com', 'nasla', 2),
(3, 'sebi@gmail.com', 'shabeeb', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `pk_int_prdct_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_prdct_nm` varchar(100) DEFAULT NULL,
  `int_price` int(15) DEFAULT NULL,
  `vchr_desc` varchar(500) DEFAULT NULL,
  `fk_int_sub_id` int(11) DEFAULT NULL,
  `int_sell_price` int(15) DEFAULT NULL,
  `vchr_product_img` varchar(50) DEFAULT NULL,
  `vchr_product_side_view` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_prdct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pk_int_prdct_id`, `vchr_prdct_nm`, `int_price`, `vchr_desc`, `fk_int_sub_id`, `int_sell_price`, `vchr_product_img`, `vchr_product_side_view`) VALUES
(1, 'Samsung A7', 36000, '16 GB,4G,1.6GHz Octa Core Processor,13MP rear camera,Android OS,v5.1.1,Corning Gorilla Glass 4,Dual sim and microSD upto 128GB and fast battery charging,SMS,MMS,Email facilities are available and also have photo or image editor', 1, 33400, 'Samsung-A7.jpg', 'img.jpg'),
(2, 'Samsung-Galaxy-S6', 56400, '32GB,4G,1.6GHz Speed,13MP rear camera with Corning Gorilla Glass 4 back panel of Nano sim.The touchscreen is super AMOLED capacitive with 16M colours', 1, 33897, 'Black-af81b.jpg', 'img.jpg'),
(3, 'Samsung-Galaxy-J7', 15999, '16GB Gold Galaxy J7 with 1.3GHz Speed and 4G.The camera is 8 Mega Pixel and can use microSD upto 128GB.The features are Geo tagging,touch focus and face detection', 1, 14999, 'Samsung-J7.jpg', 'img.jpg'),
(4, 'Samsung Z300', 8990, '8GB Golden with 1.2GHz Speed and 8MP rear camera.Its features are SMS MMS Email messaging with voice memo and 950mAh battery', 1, 7050, 'Samsung-Z300-.jpg', 'img.jpg'),
(5, 'Nokia Lumia-530', 8199, 'The Nokia Lumia 530 runs Windows Phone 8.1 and is powered by a 1430mAh removable battery.It is a single SIM Smartphone that accepts a micro sim.', 2, 4370, 'White2-8bdc2.jpg', 'img.jpg'),
(6, 'Nokia Lumia-630', 11999, 'The Nokia Lumia 630 is powered by 1.2GHz quad core qualcomm snapdragon 400 processor and it comes with 512MB of RAM.The internal storage is 128GB.', 2, 6349, 'Nokia-Lumia-630.jpg', 'img.jpg'),
(7, 'Ambrane P-26', 1199, 'It is a lightweight and compact power charger with high power ULTRA BRIGHT LED TORCH.It includes USB connectors and white with black and grey colours.', 3, 304, 'Ambrane-P.jpg', 'img.jpg'),
(8, 'Lenovo Pa10400', 4599, 'This power bank is 10400Mah having black colour and it is an dual output USB interfaces.It Support 2 devices charge at one time.', 3, 1299, 'PRP10400A.jpg', 'img.jpg'),
(9, 'Pny Portable Charger', 2000, 'Power bank have 10400 Mah of white colour.It is 3.7 volts lithium-ion battery with 10400mAH capacity.It have Single USB output port with LED torch', 3, 1200, 'Pny-Portable.jpg', 'img.jpg'),
(10, 'Utronix Monopod Selfie Stick', 749, 'Selfie stick having black colour and wired with Aux Cable and No bluetooth.Compact- Easy to Carry 3.5mm Aux Cable Hassle free- Just plug & Play Adjustable Stick Height upto 98 Cm.', 4, 189, 'Utronix-Monopod.jpg', 'img.jpg'),
(11, 'Mirox Black Selfie-stick', 699, 'This Mirox Selfie Stick comes with Bluetooth feature which makes clicking selfies very convenient. You can connect your smartphone with the monopod easily for capturing amazing snapshots. It incorporates a Bluetooth remote control.  With the help of this remote, you can click a picture with just a press of a button from a considerable distance.', 4, 236, 'Mirox-Black.jpg', 'img.jpg'),
(12, 'ASTRUM EB-171R BK', 300, 'In ear design for extra comfort and improved audio quality. The practical button makes it easy to manage calls and you can listen to tunes on the music player on your compatible mobile device. Lightweight and comfortable.', 5, 199, '159397K1.jpg', 'img.jpg'),
(13, 'ASTRUM EB-171R BL', 300, 'Earphone with Impressive Bass Driven Stereo Sound having  Blue colour.The practical button makes it easy to manage calls and you can listen to tunes on the music player on your compatible mobile device. Lightweight and comfortable.', 5, 119, '159378K1.jpg', 'img.jpg'),
(14, 'ASTRUM EB-171RMU BL', 400, 'Earphone with Ultrasound having  Blue colour.The practical button makes it easy to manage calls and you can listen to tunes on the music player on your compatible mobile device. Lightweight and comfortable.', 5, 187, '159372K1.jpg', 'img.jpg'),
(15, 'ASTRUM EB-171R RD', 300, 'Earphone with Ultrasound having Red colour.The practical button makes it easy to manage calls and you can listen to tunes on the music player on your compatible mobile device. Lightweight and comfortable.', 5, 200, '159365K1.jpg', 'img.jpg'),
(16, 'Samsung Z1 SM-Z130H (Gold)', 5000, 'Z1 has 3.1MP primary camera with flash and 0.3MP front facing camera and it has 4-inch (10.08 centimeters) TFT capacitive touchscreen with 480 x 800 pixels resolution 16M color support.Tizen operating system with 1.2GHz dual core processor, 756MB RAM, 4GB internal memory expandable up to 64GB and dual micro SIM (GSM+GSM)', 1, 3999, 'Samsung Z1.jpg', 'img.jpg'),
(17, 'Samsung Galaxy S6 Edge Plus', 60000, 'S6 have 16MP primary camera with LED flash, auto focus and 5MP front facing camera and 5.7-inch (14.47 centimeters) quad HD capacitive touchscreen with 2560 x 1440 pixels resolution and 518 ppi pixel density.It have 3000mAH lithium-ion battery.', 1, 53900, 'S6 Edge Plus.jpg', 'img.jpg'),
(18, 'Nokia Asha 500', 7000, 'Nokia Asha 500 comes with Nokia Asha Platform 1.1.1 OS. This device supports Dual SIM with Dual Standby.This is a Low Budget phone loaded with loads of application. Nokia Asha 500 is built with Nokia Asha Platform 1.1.1 OS. The Asha 500 has a midsized 2.8-inch capacitive touch display with resolution of 240x320 pixels at 143pixels per inch density. This device also has tactile feedback and Orientation sensor along with Low power mode.', 2, 5209, 'Nokia-Asha-Red.jpg', 'img.jpg'),
(19, 'Nokia Asha 502 ', 9000, 'Nokia Asha 502 is a fabulous creation by Nokia. Nokia Asha 502 looks marvellous and includes some high end features to offer you an ultimate phone experience. This dual SIM phone has a sleek and stylish body and can be easily put up in your pockets of bags. Moreover, the front panel looks perfect with 3.0 inch capacitive multi touch display screen size that has 320 x 240 pixels resolution.', 2, 7889, 'Nokia_Asha_502.jpg', 'img.jpg'),
(20, 'Samsung Galaxy S3 Neo GT-I9300', 31070, 'S3 have 8MP primary camera with HD recording, geotagging, touch focus, face and smile detection, image stabilization, auto focus, image editor and 1.9MP front facing camera and 4.8-inch super AMOLED scratch resistant screen with 720 x 1280 pixels resolution.It have Android Icecream Sandwich 4.0 operating system with 1.4GHz Quad core processor and 16GB internal memory expandable up to 64GB.', 1, 10249, 'S3 Neo GT-I9300.jpg', 'img.jpg'),
(21, 'iPad Air 64 GB Wifi ', 49000, 'Experience the air in your hands with this all new sleekest and smartest iPad Air from Apple.With its Wi-Fi connectivity it provides seamless internet browsing experience anywhere and also you can download loads of data in seconds.', 6, 48000, 'Apple-iPad-Air.jpg', 'img.jpg'),
(22, 'Apple 4th Generation iPad 64GB', 50090, 'System Requirement: Mac 10.6.8 and Above, Windows 7, Windows Vista, Windows XP Home or Professional with Service Pack 2 or Later, Upto 10 hours of Surfing the Web on Wi-Fi, Watching Video or Listening to Music, Digital Compass, Audio Frequency response: 20Hz to 20000Hz, Viewable, Full-screen Zoom Magnification.', 6, 48800, 'Apple-4th-iPad.jpg', 'img.jpg'),
(23, 'iPad Air 16GB Wifi Cellular Silver', 50000, 'Experience the air in your hands with this all new sleekest and smartest iPad Air from Apple. With its impressive features and engaging design it is a lot more than just a tablet and weighs only 469g. Nothing comes between you and what you love with its superb quality Retina Display.', 6, 48800, 'Apple4-533eb.jpg', 'img.jpg'),
(24, 'iPad Pro Wifi+Cellular Tablet', 99000, 'iPad Pro Wifi Cellular is the biggest iPad produced by Apple. Consisting of a large 32.76 cms (12.9) multi-touch Retina display, this iPad is meant to keep you entertained and informed at the same time. With this iPad you can have the luxury of most innovative and advanced mobile technologies at your fingertips.', 6, 91900, 'Pro-Wifi-Cellular-Tablet.jpg', 'img.jpg'),
(25, 'Apple iPad Air SpaceGrey', 38900, 'The A7 chip with 64-bit architecture and M7 motion coprocessor of the Apple iPad Air Apace grey provide exceptional speed, while its iOS 7 operating system enhances your user experience. Its internal system memory of 16GB proves sufficient for storing your favourite games and movies, so that you can stay entertained at all times. On a single charge, the Apple iPad Air with Wi-Fi can go on for as long as 10 hours. This iPad has a 1.2MP camera that is useful for video calling and a 5MP primary cam', 6, 34500, 'Apple_iPad_Air.jpg', 'img.jpg'),
(26, 'Apple iPad Air (32GB, WiFi), Silver', 32900, 'iPad Air is just 7.5 millimeters thin and weighs just one pound. Even though it''s extremely light, it has a refined aluminum unibody enclosure that feels solid and durable in your hand. Get fast Wi-Fi performance using 802.11n with MIMO.3 And the Wi-Fi + Cellular model supports more LTE bands for fast connections the world over.It have Weighs 469 gm and 7.5 mm thin; 8820mAh rechargeable lithium-polymer battery providing up to 10 hours of internet usage time.', 6, 32399, 'Apple_iPad_AirSilver.jpg', 'img.jpg'),
(27, 'iPad mini with Retina display', 45000, 'It is 7.9 inch Retina Display, LED-backlit,A7 Chip, M7 Motion Coprocessor and 5 MP Rear Camera with 1.2 MP Front.', 6, 39900, 'iPad_mini.jpg', 'img.jpg'),
(28, 'Apple iPad 2 ', 50000, 'Apple''s iPad 2 is dramatically slim, thin and very fast. The 9.7-inch Multi-Touch screen lets you operate this Apple tablet PC more conveniently than an iPod or iPhone. Whether it is flipping a photograph or zooming a map, the operations have become more accurate and precise on the Apple iPad 3G.', 6, 31999, 'Apple_iPad_2.jpg', 'img.jpg'),
(29, 'Ambrane P-1310 ', 2499, 'This portable charger by Ambrane comes with a 13000 mAh capacity. This means that if you are using a 2500mAh battery smartphone, you will be able to charge it approximately 5 times with a fully charged power bank. P-1310 features two USB 2.0 ports one Micro-USB port, and gives 5V/2.1A max output.Ambrane 13000 mAh power bank uses advanced chipsets which makes the charger highly safe to use. ', 3, 999, 'P-1310.jpg', 'img.jpg'),
(30, 'Ambrane P1000', 900, 'P1000 have 10400 mAh and Dual USB Output 2.1 for IPAD ,Tablets & 1A For Smart Phones and the Battery Status LED.It is an best Product for Smart Phones , IPhones & IPADs.', 3, 899, 'P1000.jpg', 'img.jpg'),
(31, 'Ambrane P444', 1599, 'P444 have high power storage and 4000mAH battery and charging time is 5 to 7 hours.It is easy to use.', 3, 599, 'P444.jpg', 'img.jpg'),
(32, 'Ambrane P22 ', 600, 'P-22 is a portable USB power bank which can be easily used with any type of mobile phone, media player, tablet PC, digital camera or any electronic device. You can take this compact power charger anywhere with you and avoid disappointing moments by recharging your gadgets that are running low on battery.', 3, 300, 'P22.jpg', 'img.jpg'),
(33, 'Ambrane P-6000 6000 mAh', 2199, 'Charge your smartphone or tablet on-the-go with the Ambrane P-6000 powerbank which is powered by Lithium-ion batteries.This powerbank has a charge capacity of 6000 mAh so you can charge a phone or tablet a few times. With the Ambrane P-6000, your gadgets will never run out of charge even when you’re travelling long distance without a stable power source. ', 3, 699, 'p6000.jpeg', 'img.jpg'),
(34, 'Ambrane P-1001GRY', 2999, 'Featuring a compact and chrome finish, the Ambrane P-1001 is made to make life easy for you. Its sleek body lets you slip it into handbag before you leave for work. Thanks to the indicative LEDs, you are kept updated about the charging status of the device.', 3, 1099, 'p1001.jpeg', 'img.jpg'),
(35, 'Amzer Bluetooth Selfie Stick', 1499, 'Make your next selfie picture perfect with the Amzer® Bluetooth Selfie Stick! With a Bluetooth V3.0 controller, just one click and you''ve snapped a group pic without being left out! Compact and lightweight this must-have features a lockable and 180º tilting phone holder and Built-in rechargeable battery.', 4, 1199, 'amzer.jpg', 'img.jpg'),
(36, 'Handheld Monopod Selfie Stick', 400, 'Aux Wired Mini Selfie Stick Handheld Monopod Extendable Fold Selfie Stick For iPhone Samsung Smartphone Phones Camera selfie (Color May vary) and it is Small Unique Pocket Friendly Design.It have Non-slip soft Rubber handle.', 4, 125, 'aux_handheld.jpg', 'img.jpg'),
(37, 'Selfie Stick Monopod', 799, 'Selfie Stick Monopod With Wired Aux Cable Connectivity Compatible For Samsung Galaxy J7 J700F-PINK and No Need Of Remotes, Just Connect The Phone To The Aux Cable And Simply Press The Button On The Stick.It is Portable, lightweight, easy to carry with detachable holder.', 4, 245, 'selfie.jpg', 'img.jpg'),
(38, 'DMG Extendable Selfie Stick ', 500, 'DMG Extendable Selfie Stick Monopod with Bluetooth Wireless Remote For iPhone / Mobiles / Cameras and Bluetooth Remote Shutter.It Comes in attractive colours, random colour will be shipped and is Durable and long lasting build quality.', 4, 399, 'sel_stick.jpg', 'img.jpg'),
(39, 'Monopod With Remote Wireless', 799, 'Selfie Stick Monopod With Bluetooth Remote Wireless Shutter Connectivity Compatible For Lenovo Vibe X3 -BLACK and is Compatible With All Smartphones Which Support Bluetooth Connectivity.It is Best For Capturing Photos & Videos and  Lightweight, Easy To Carry With Detachable Holder.', 4, 290, 'sel_bluestick.jpg', 'img.jpg'),
(40, 'Cell Phone Tripod', 900, 'Cell Phone Tripod, DMG Mini Adjustable Tripod Stand with Universal Mount for Digital Camera Go Pro iPhone Mobiles and Selfie Sticks and is Perfect for time-lapse photos, low-light photos, groups shots, steady video recordings and more.It is Lightweight and collapsible 2 in 1 mobile phone and camera tripod for multiple devices.', 4, 699, 'tripod.jpg', 'img.jpg'),
(41, 'Monopod With Easy Aux Cable', 300, 'Taking Self-portraits And Videos Has Never Been Easier! The Ultimate Monopod/ Selfie Pod To Capture Every Special Moment, Whether You Are Alone For A Selfie Or With Lots Of Friends To Get A Groupie. No Need Of Remotes, Just Connect The Phone To The Aux Cable And Simply Press The Button On The Stick To Take The Best Selfies.', 4, 199, 'ulti_selfie.jpg', 'img.jpg'),
(42, 'Brand YunTeng Selfie Stick ', 800, 'Brand YunTeng 4-Section Retractable Handheld Monopod Selfie Stick for GoPro Hero and is extendable handheld selfie stick for iphone 4 5 5s, samsung S3 S4,other phone and camera.', 4, 555, 'brand.jpg', 'img.jpg'),
(43, 'PhilipsSHE3590BK/98 ', 499, 'The ultra small in-ear design with soft caps for comfort and compact fit. With small efficient speakers for dynamic bass and clear sound.Ultra small, lighweight in-ear design for best fit in smaller ears, for long hours listening.', 8, 405, 'phi_ear.jpg', 'img.jpg'),
(44, 'SHE1455WT Headphone with Mic', 449, 'With the integrated microphone and call button you can use this Philips headset for music as well as calls from your mobile phone. Enjoy handsfree calling, while easily accepting and ending calls from your headset.The ideal cable length to give you the freedom to put your audio device where you want.', 8, 317, '1455.jpg', 'img.jpg'),
(45, 'She1405 Black', 500, 'Philips in-Ear Headphone Headset With Mic SHE1405 black COMPATIBLE WITH IPHONES, BLACKBERRY, SAMSUNG , MOTOROLA, HTC, LG, SONY', 8, 349, 'inear.jpg', 'img.jpg'),
(46, 'SHE3590BL/10 In-Ear Headphone', 699, 'The Super-small speaker drivers fit comfortably inside the ear and thanks to the exceptionally snug fit the outside noise is sealed out for high-intensity listening experience.', 8, 415, 'blue.jpg', 'img.jpg'),
(47, 'SHE1455BK Headphone with Mic', 449, 'With the integrated microphone and call button you can use this Philips headset for music as well as calls from your mobile phone. Enjoy handsfree calling, while easily accepting and ending calls from your headset.', 8, 344, '1455bk.jpg', 'img.jpg'),
(48, 'SHQ2305WS/00 ', 1000, 'Keep your Actionfit SHQ2305 headphones tightly in your ears no matter what you do with a unique stability ring. Just focus only on your workout, not on headphones falling out.', 8, 899, 'shq.jpg', 'img.jpg'),
(49, 'SHB1200 Bluetooth Earbud Headset', 1000, 'Its Bluetooth profiles: Handsfree and headset and version is 3.0.Its features are Answer/end call, reject call, last number redial, call transfer and Clear and echo free calls', 8, 868, 'shb1200.jpg', 'img.jpg'),
(50, 'SHE2001/10 Earbud Headphone', 500, 'With 15mm speakers, these ear bud headphones are valued for the bass sound. Unique ergonomics design with slim cap ensure comfort fit even for earbud.Slim cap is ergonomically designed according to the anatomy of the human ear canal.', 0, 255, '2001.jpg', 'img.jpg'),
(51, 'Hs 130 In Ear Wired Earphones', 699, 'Samsung Hs 130 In Ear Wired Earphones Without Mic White having cord length 1.2mm.', 9, 675, 'Hs_130.jpg', 'img.jpg'),
(52, 'EHS61ASNBECINU ', 600, 'Samsung EHS61ASNBECINU In Ear Wired Earphones with Mic - Black having length 0.5mm. ', 9, 449, 'EHS61.jpg', 'img.jpg'),
(53, ' HS-130 In Ear Wired Headphone ', 799, 'The light, simple design and soft ear buds provide comfort without creating fatigue or discomfort when listening to music for a long time. The balance between the clear, clean treble and the deep bass delivers a rich aural experience for all music genres. ', 9, 685, 'ear.jpg', 'img.jpg'),
(54, 'Nokia X2 4GB Green', 9999, 'Nokia X2 4GB Green with dual sim having core 1.2GHz and 5MP primary camera.It has Multipoint-touch, Tactile Feedback, Brightness Control, Scratch Resistant Glass, ClearBlack Display Technology.', 2, 7099, 'Nokia-X2-Green.jpg', 'img.jpg'),
(55, 'Nokia Lumia 1520 (16 GB-Black)', 30000, 'A refurbished product is one that has been restored to its original working condition by the manufacturer or seller and comes with a manufacturer/seller warranty. It may have been earlier returned to the manufacturer/seller due to various reasons like minor box damage while shipping, manufacturing defect etc.', 2, 24000, 'Lumia-1520.jpg', 'img.jpg'),
(56, 'Nokia Lumia 520 (8 GB-Red)', 6000, 'A refurbished product is one that has been restored to its original working condition by the manufacturer or seller and comes with a manufacturer/seller warranty. It may have been earlier returned to the manufacturer/seller due to various reasons like minor box damage while shipping, manufacturing defect etc. but is fully tested and offered in a perfect working condition.', 2, 4500, 'Nokia-Lumia-520.jpg', 'img.jpg'),
(57, 'Nokia Lumia 1320 Black', 40000, 'Nokia 1320 smartphone comes with a user-friendly Windows Phone 8.1 with Lumia Cyan operating system. It enables you to download innumerable apps in your smartphone to simplify your everyday tasks and gives you an instant access to the files and apps stored in the smartphone.', 2, 37999, 'Nokia-Lumia-1320.jpg', 'img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE IF NOT EXISTS `tbl_purchase` (
  `pk_int_purchase_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_int_product_id` int(11) DEFAULT NULL,
  `int_quantity` int(15) DEFAULT NULL,
  `int_total_amount` int(11) DEFAULT NULL,
  `dat_date` date DEFAULT NULL,
  `fk_int_login_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`pk_int_purchase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE IF NOT EXISTS `tbl_registration` (
  `pk_int_reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_fname` varchar(30) DEFAULT NULL,
  `vchr_lname` varchar(30) DEFAULT NULL,
  `vchr_address` varchar(50) DEFAULT NULL,
  `int_pincode` varchar(20) DEFAULT NULL,
  `vchr_mobilenum` varchar(20) DEFAULT NULL,
  `fk_int_login_id` int(11) DEFAULT NULL,
  `dat_date` date DEFAULT NULL,
  `vchr_status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`pk_int_reg_id`, `vchr_fname`, `vchr_lname`, `vchr_address`, `int_pincode`, `vchr_mobilenum`, `fk_int_login_id`, `dat_date`, `vchr_status`) VALUES
(1, 'Nasla', 'C K', 'kallanthode', '876543', '8976543201', 2, '2016-01-15', 'Inactive'),
(2, 'sebi', 'shabeeb', 'othayi', '987654', '8976543210', 3, '2016-02-08', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `pk_int_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_int_prdct_id` int(11) DEFAULT NULL,
  `int_quantity` int(15) DEFAULT NULL,
  PRIMARY KEY (`pk_int_stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`pk_int_stock_id`, `fk_int_prdct_id`, `int_quantity`) VALUES
(1, 1, 5),
(2, 2, 6),
(3, 3, 9),
(4, 4, 7),
(5, 5, 6),
(6, 6, 4),
(7, 7, 9),
(8, 8, 8),
(9, 9, 7),
(10, 10, 4),
(11, 11, 14),
(12, 12, 12),
(13, 13, 3),
(14, 14, 13),
(15, 15, 8),
(16, 16, 16),
(17, 17, 23),
(18, 18, 6),
(19, 19, 10),
(20, 20, 14),
(21, 21, 6),
(22, 22, 7),
(23, 23, 6),
(24, 24, 7),
(25, 25, 9),
(26, 26, 9),
(27, 27, 9),
(28, 28, 9),
(29, 29, 7),
(30, 30, 9),
(31, 31, 9),
(32, 32, 7),
(33, 33, 6),
(34, 34, 8),
(35, 35, 9),
(36, 36, 8),
(37, 37, 8),
(38, 38, 8),
(39, 39, 7),
(40, 40, 8),
(41, 41, 9),
(42, 42, 8),
(43, 43, 8),
(44, 44, 8),
(45, 45, 9),
(46, 46, 7),
(47, 47, 9),
(48, 48, 9),
(49, 49, 10),
(50, 50, 9),
(51, 51, 9),
(52, 52, 9),
(53, 53, 9),
(54, 54, 9),
(55, 55, 9),
(56, 56, 9),
(57, 57, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_category` (
  `pk_int_sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `vchr_sub_categry_nm` varchar(30) DEFAULT NULL,
  `fk_int_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_int_sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`pk_int_sub_id`, `vchr_sub_categry_nm`, `fk_int_category_id`) VALUES
(1, 'Samsung', 1),
(2, 'Nokia', 1),
(3, 'Power bank', 2),
(4, 'Selfie sticks', 2),
(5, 'Astrum', 3),
(6, 'Apple iPad', 4),
(7, 'HCL', 4),
(8, 'Philips', 3),
(9, 'Samsung', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `pk_int_user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`pk_int_user_role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`pk_int_user_role_id`, `user_role_name`) VALUES
(1, 'admin'),
(2, 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
