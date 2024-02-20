DROP PROCEDURE IF EXISTS createTables;

DELIMITER $$

CREATE PROCEDURE createTables()
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;

        SELECT "Error at create table statements" AS msg;
    END;

    START TRANSACTION;

    DROP TABLE IF EXISTS address;

    DROP TABLE IF EXISTS employee;

    DROP TABLE IF EXISTS contract;

    CREATE TABLE contract (
        ID           BIGINT UNSIGNED AUTO_INCREMENT,
        registration VARCHAR(100) NOT NULL,
        admission    DATE NOT NULL,
        wage         DECIMAL(11, 2) NOT NULL,
        office       VARCHAR(30) NOT NULL,

        PRIMARY KEY(ID)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

    CREATE TABLE employee (
        CPF      BIGINT UNSIGNED,
        name     VARCHAR(50) DEFAULT NULL,
        surname  VARCHAR(100) DEFAULT NULL,
        age      INT DEFAULT NULL,
        sons     SMALLINT UNSIGNED DEFAULT 0,
        contract BIGINT UNSIGNED NOT NULL,

        FOREIGN KEY (contract)
        REFERENCES
            contract(ID)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

        PRIMARY KEY(CPF)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

    CREATE TABLE address (
        employeeID BIGINT UNSIGNED NOT NULL,
        uf         CHAR(2) NOT NULL,
        city       VARCHAR(100) NOT NULL,
        district   VARCHAR(100) NOT NULL,
        street     VARCHAR(100) NOT NULL,
        number     INT NOT NULL,
        cep        INT NOT NULL,
        complement TEXT,

        FOREIGN KEY (employeeID) REFERENCES
            employee(CPF)
        ON UPDATE CASCADE
        ON DELETE CASCADE,

        PRIMARY KEY(employeeID, uf, city, district, street, number, cep)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

    COMMIT;

END $$

DELIMITER ;

CALL createTables();