DROP DATABASE IF EXISTS `virtualt_linegymDB`;
CREATE DATABASE IF NOT EXISTS `virtualt_linegymDB` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `virtualt_linegymDB`;

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
