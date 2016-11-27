DROP DATABASE IF EXISTS `virtualt_dbgym`;
CREATE DATABASE IF NOT EXISTS `virtualt_dbgym` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `virtualt_dbgym`;

/*==============================================================*/
/* Table: BOXES                                                 */
/*==============================================================*/
CREATE TABLE BOXES (
  ID_BOX               INTEGER            NOT NULL AUTO_INCREMENT,
  NAME_BOX             VARCHAR(100)       NOT NULL,
  NIT_BOX              VARCHAR(100)       NOT NULL,
  EMAIL_BOX            VARCHAR(50)        NOT NULL,
  ADDRESS_BOX          VARCHAR(100)       NOT NULL,
  PHONE_BOX            VARCHAR(20)        NOT NULL,
  IMAGE_BOX            VARCHAR(10000)     NOT NULL,
  PRIMARY KEY (ID_BOX)
);

/*==============================================================*/
/* Table: PLANS                                              */
/*==============================================================*/
CREATE TABLE PLANS (
  ID_PLAN                    INTEGER          NOT NULL AUTO_INCREMENT,
  ID_BOX                     INTEGER          NOT NULL,
  JOINING_PLAN               DATE             NOT NULL,
  NAME_PLAN                  VARCHAR(100)     NOT NULL,
  DAYS                       INTEGER          NOT NULL,
  PRICE                      INTEGER          NOT NULL,
  DETAILS                    VARCHAR(300)    ,
  PRIMARY KEY (ID_PLAN)
);

/*==============================================================*/
/* Table: PERSONS                                              */
/*==============================================================*/
CREATE TABLE PERSONS (
  ID_PERSON                    INTEGER                        NOT NULL AUTO_INCREMENT,
  ID_BOX                       INTEGER                        NOT NULL,
  JOINING_PERSON               DATE                           NOT NULL,
  NAME_PERSON                  VARCHAR(200)                   NOT NULL,
  GENDER_PERSON                VARCHAR(1)                     NOT NULL,
  BIRTHDATE_PERSON             DATE                           NOT NULL,
  AGE_PERSON                   INTEGER                        NOT NULL,
  EMAIL_PERSON                 VARCHAR(50)                    NOT NULL,
  PHONE_PERSON                 VARCHAR(30)                    NOT NULL,
  ADDRESS_PERSON               VARCHAR(100)                   NOT NULL,
  IDENTIFICATION               VARCHAR(50)                    NOT NULL,
  PASSWORD_PERSON              VARCHAR(500)                   NOT NULL,
  STATUS_PERSON                VARCHAR(3)                     NOT NULL,
  TYPE_PERSON                  VARCHAR(3)                     NOT NULL,
  PROFILE_PICTURE              VARCHAR(10000)                 ,
  PRIMARY KEY (ID_PERSON)
);

/*==============================================================*/
/* Table: SUBSCRIPTIONS_RECORD                                  */
/*==============================================================*/
CREATE TABLE SUBSCRIPTIONS_RECORD (
  ID_SUBSCRIPTION       INTEGER          NOT NULL AUTO_INCREMENT,
  ID_PERSON             INTEGER          NOT NULL,
  ID_PLAN               INTEGER          NOT NULL,
  DATE_SUBSCRIPTION     DATE             NOT NULL,
  PRICE                 INTEGER          NOT NULL,
  PAID                  INTEGER          ,
  STATUS                VARCHAR(3)       NOT NULL,
  PRIMARY KEY (ID_SUBSCRIPTION)
);

/*==============================================================*/
/*CONSTRAINTS                                                   */
/*==============================================================*/
ALTER TABLE BOXES   ADD UNIQUE     BOX_UK_ID_BOX (ID_BOX);

ALTER TABLE PLANS   ADD UNIQUE     PLA_UK_ID_PLA (ID_PLAN);
ALTER TABLE PLANS   ADD CONSTRAINT PLA_FK_IDBOX FOREIGN KEY (ID_BOX) REFERENCES BOXES (ID_BOX) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE PERSONS ADD UNIQUE     PER_UK_ID_PER (ID_PERSON);
ALTER TABLE PERSONS ADD CONSTRAINT PER_FK_IDBOX FOREIGN KEY (ID_BOX) REFERENCES BOXES (ID_BOX) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE PERSONS ADD CONSTRAINT PER_CK_TI_PER  CHECK (TYPE_PERSON IN ('SUP'/*SUPERADMINISTRADOR*/,'ADM'/*ADMINISTRADOR*/,'CLI'/*CLIENTE*/,'COA'/*COACH*/));

ALTER TABLE SUBSCRIPTIONS_RECORD ADD UNIQUE     SUB_UK_ID_SUB (ID_SUBSCRIPTION);
ALTER TABLE SUBSCRIPTIONS_RECORD ADD CONSTRAINT SUB_FK_ID_PER FOREIGN KEY (ID_PERSON) REFERENCES PERSONS (ID_PERSON) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE SUBSCRIPTIONS_RECORD ADD CONSTRAINT SUB_FK_ID_PLA FOREIGN KEY (ID_PLAN) REFERENCES PLANS (ID_PLAN) ON DELETE RESTRICT ON UPDATE RESTRICT;
ALTER TABLE SUBSCRIPTIONS_RECORD ADD CONSTRAINT SUB_CK_STATUS CHECK (STATUS IN ('PEN'/*PENDING*/,'CLO'/*CLOSED*/));

/*==============================================================*/
/*INSERTS                                                       */
/*==============================================================*/
INSERT INTO `BOXES` (`ID_BOX`, `NAME_BOX`, `NIT_BOX`, `EMAIL_BOX`, `ADDRESS_BOX`, `PHONE_BOX`, `IMAGE_BOX`) VALUES (NULL, 'XTREME TRAINING CENTER', '1538846461684', 'xtreme@gmail.com', 'Avenida norte #24-32', '7400318', 'xtreme.jpg');
INSERT INTO `PERSONS` (`ID_PERSON`, `ID_BOX`, `JOINING_PERSON`, `NAME_PERSON`, `GENDER_PERSON`, `BIRTHDATE_PERSON`, `AGE_PERSON`, `EMAIL_PERSON`, `PHONE_PERSON`, `ADDRESS_PERSON`, `IDENTIFICATION`, `PASSWORD_PERSON`, `STATUS_PERSON`, `TYPE_PERSON`, `PROFILE_PICTURE`) VALUES (NULL, 1, '2016-11-19', 'Wilson Gonzalez', 'M', '1993-10-04', '23', 'wilson.gonzalez@gmail.com', '3214046338', 'Calle 5 #11-61', '1049635599', '202cb962ac59075b964b07152d234b70', 'ACT', 'ADM', 'profile.jpg');


--                            DE AQUI PARA ABAJO NO
--                            DE AQUI PARA ABAJO NO
--                            DE AQUI PARA ABAJO NO
--                            DE AQUI PARA ABAJO NO
--                            DE AQUI PARA ABAJO NO


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_user`
--
--
-- CREATE TABLE IF NOT EXISTS `auth_user` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `login_id` varchar(20) NOT NULL,
--   `pass_key` varchar(30) NOT NULL,
--   `security` varchar(50) NOT NULL,
--   `level` int(2) NOT NULL,
--   `sex` varchar(10) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `auth_user`
--
--
-- INSERT INTO `auth_user` (`id`, `login_id`, `pass_key`, `security`, `level`, `sex`, `name`) VALUES
-- (0, 'superadmin', 'superadmin', 'superadmin', 6, 'male', 'Francisco Javier Barrera'),
-- (1, 'admin', 'admin', 'admin', 5, 'male', 'Mr.Admin'),
-- (2, 'cajero', 'cajero', 'cajero', 4, 'male', 'cashier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `healthstatus`
--
--
-- CREATE TABLE IF NOT EXISTS `healthstatus` (
--   `hs_id` int(20) NOT NULL,
--   `id` int(7) NOT NULL,
--   `name` varchar(30) NOT NULL,
--   `date1` datetime NOT NULL,
--   `bodyfat` varchar(25) NOT NULL,
--   `water` varchar(30) NOT NULL,
--   `muscle` varchar(30) NOT NULL,
--   `calorie` varchar(30) NOT NULL,
--   `bone` varchar(30) NOT NULL,
--   `remarks` varchar(200) NOT NULL,
--   PRIMARY KEY (`hs_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `healthstatus`
-- --
--
-- INSERT INTO `healthstatus` (`hs_id`, `id`, `name`, `date1`, `bodyfat`, `water`, `muscle`, `calorie`, `bone`, `remarks`) VALUES
-- (0, 15, '15', '2016-02-14 00:00:00', 'Body Fatwr', 'Waterwr', 'Musclewr', 'Caloriewr', 'Bonewr', 'Remarkswr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mem_types`
--
--
-- CREATE TABLE IF NOT EXISTS `mem_types` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `mem_type_id` varchar(11) NOT NULL,
--   `name` varchar(100) NOT NULL,
--   `days` int(11) NOT NULL,
--   `rate` int(11) NOT NULL,
--   `details` text NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- /*==============================================================*/
-- /* Table: PLANS                                              */
-- /*==============================================================*/
-- CREATE TABLE IF NOT EXISTS PLANS (
--    ID_PLAN                    INTEGER          NOT NULL AUTO_INCREMENT,
--    ID_ADMIN                   INTEGER          NOT NULL,
--    JOINING_PLAN               DATE             NOT NULL,
--    NAME_PLAN                  VARCHAR(100)     NOT NULL,
--    DAYS                       INTEGER          NOT NULL,
--    PRICE                      INTEGER          NOT NULL,
--    DETAILS                    VARCHAR(300)    ,
--    PRIMARY KEY (ID_PLAN)
-- );

--
-- Volcado de datos para la tabla `mem_types`
--
--
-- INSERT INTO `mem_types` (`id`, `mem_type_id`, `name`, `days`, `rate`, `details`) VALUES
-- (2, 'XKCLTDSJ', 'Monthly', 30, 1000, 'Monthly'),
-- (4, 'CEJHUNAD', 'test', 30, 300, 'test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subsciption`
--
--
-- CREATE TABLE IF NOT EXISTS `subsciption` (
--   `id` int(7) NOT NULL AUTO_INCREMENT,
--   `mem_id` int(20) NOT NULL,
--   `name` varchar(100) NOT NULL,
--   `sub_type` varchar(100) NOT NULL,
--   `paid_date` date NOT NULL,
--   `expiry` date NOT NULL,
--   `total` int(11) NOT NULL,
--   `paid` int(11) NOT NULL,
--   `invoice` varchar(30) NOT NULL,
--   `sub_type_name` text NOT NULL,
--   `bal` int(11) NOT NULL,
--   `exp_time` bigint(20) NOT NULL,
--   `renewal` varchar(10) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;



--
-- Volcado de datos para la tabla `subsciption`
--
--
-- INSERT INTO `subsciption` (`id`, `mem_id`, `name`, `sub_type`, `paid_date`, `expiry`, `total`, `paid`, `invoice`, `sub_type_name`, `bal`, `exp_time`, `renewal`) VALUES
-- (15, 1454208171, 'new', 'NUYVCFEJ', '2016-01-31', '2016-02-01', 100, 0, '54208204x8m', 'Per Session', 100, 1454281200, 'yes'),
-- (16, 1454763163, 'we', 'XKCLTDSJ', '2016-02-06', '2016-03-07', 1000, 0, '54763190hrs', 'Monthly', 1000, 1457305200, 'yes');
--
-- -- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `time_table`
--

-- CREATE TABLE IF NOT EXISTS `time_table` (
--   `id` int(11) NOT NULL AUTO_INCREMENT,
--   `mem_id` varchar(20) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `details` text NOT NULL,
--   `date` date NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_data`
--
--
-- CREATE TABLE IF NOT EXISTS `user_data` (
--   `id` int(7) NOT NULL AUTO_INCREMENT,
--   `wait` varchar(10) NOT NULL,
--   `newid` int(20) NOT NULL,
--   `name` varchar(50) NOT NULL,
--   `address` text NOT NULL,
--   `zipcode` bigint(20),
--   `birthdate` date NOT NULL,
--   `contact` bigint(20) NOT NULL,
--   `email` varchar(100) NOT NULL,
--   `pic_add` text,
--   `height` float,
--   `weight` int(11),
--   `nationality` text,
--   `facebookaccount` text,
--   `twitteraccount` text ,
--   `contactperson` text ,
--   `previousgym` text ,
--   `yearstraining` text ,
--   `joining` date NOT NULL,
--   `age` int(11) NOT NULL,
--   `sex` varchar(10) ,
--   `proof` text ,
--   `other_proof` text ,
--   PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `user_data`
--

-- INSERT INTO `user_data` (`id`, `wait`, `newid`, `name`, `address`, `zipcode`, `birthdate`, `contact`, `email`, `pic_add`, `height`, `weight`, `nationality`, `facebookaccount`, `twitteraccount`, `contactperson`, `previousgym`, `yearstraining`, `joining`, `age`, `sex`, `proof`, `other_proof`) VALUES
-- (14, 'no', 1454208171, 'a', 'new', 6100, '2016-01-05', 9209668896, 'new@gmail.com', '../images/1454208171.png', 6, 130, 'new', 'new', 'new', 'new', 'new', 'new', '2016-01-31', 34, 'Male', 'GSIS Card', ' '),
-- (15, 'no', 1454763163, 'b', 'we', 0, '2016-02-04', 9209668897, 'we@gmail.com', '../images/1454763163.png', 0, 0, 'we', 'we', 'we', 'we', 'we', 'we', '2016-02-06', 34, 'Male', 'GSIS Card', ' ');

/*==============================================================*/
/* Table: PERSONS                                              */
/*==============================================================*/
-- CREATE TABLE IF NOT EXISTS PERSONS (
--    ID_PERSON                    INTEGER                        NOT NULL AUTO_INCREMENT,
--    ID_ADMIN                     INTEGER                        ,
--    JOINING_PERSON               DATE                           NOT NULL,
--    NAME_PERSON                  VARCHAR(200)                   NOT NULL,
--    GENDER_PERSON                VARCHAR(1)                     NOT NULL,
--    BIRTHDATE_PERSON             DATE                           NOT NULL,
--    AGE_PERSON                   INTEGER                        NOT NULL,
--    EMAIL_PERSON                 VARCHAR(50)                    NOT NULL,
--    PHONE_PERSON                 VARCHAR(30)                    NOT NULL,
--    ADDRESS_PERSON               VARCHAR(100)                   NOT NULL,
--    IDENTIFICATION               VARCHAR(50)                    NOT NULL,
--    PASSWORD_PERSON              VARCHAR(500)                   NOT NULL,
--    STATUS_PERSON                VARCHAR(3)                     NOT NULL,
--    TYPE_PERSON                  VARCHAR(3)                     NOT NULL,
--    PROFILE_PICTURE              VARCHAR(10000)                 ,
--    PRIMARY KEY (ID_PERSON)
-- );
-- INSERT INTO `PERSONS` (`ID_PERSON`, `ID_ADMIN`, `JOINING_PERSON`, `NAME_PERSON`, `GENDER_PERSON`, `BIRTHDATE_PERSON`, `AGE_PERSON`, `EMAIL_PERSON`, `PHONE_PERSON`, `ADDRESS_PERSON`, `IDENTIFICATION`, `PASSWORD_PERSON`, `STATUS_PERSON`, `TYPE_PERSON`, `PROFILE_PICTURE`) VALUES (NULL, NULL, '2016-11-19', 'Francisco Barrera', 'M', '1993-10-04', '23', 'francisco.barrera@uptc.edu.co', '3214046338', 'Calle 5 #11-61', '1049635599', '202cb962ac59075b964b07152d234b70', 'ACT', 'SUP', '../../assets/lineGym/img/profile.jpg');
-- INSERT INTO `PERSONS` (`ID_PERSON`, `ID_ADMIN`, `JOINING_PERSON`, `NAME_PERSON`, `GENDER_PERSON`, `BIRTHDATE_PERSON`, `AGE_PERSON`, `EMAIL_PERSON`, `PHONE_PERSON`, `ADDRESS_PERSON`, `IDENTIFICATION`, `PASSWORD_PERSON`, `STATUS_PERSON`, `TYPE_PERSON`, `PROFILE_PICTURE`) VALUES (NULL, 1, '2016-11-19', 'Wilson Gonzalez', 'M', '1993-10-04', '23', 'wilson.gonzalez@gmail.com', '3214046338', 'Calle 5 #11-61', '1049635599', '202cb962ac59075b964b07152d234b70', 'ACT', 'ADM', '../../assets/lineGym/img/profile.jpg');

-- /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
-- /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
-- /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
