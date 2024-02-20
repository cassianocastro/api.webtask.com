DROP PROCEDURE IF EXISTS createRegisters;

DELIMITER $$

CREATE PROCEDURE createRegisters()
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;

        SELECT "Error at insert statements" AS msg;
    END;

    START TRANSACTION;

    INSERT INTO
        contract (registration, admission, wage, office)
    VALUES
        ('001', '2021-07-05', 3000, 'Encarregado'),
        ('002', '2021-07-02', 3000, 'Gerente'),
        ('003', '2021-07-20', 1000, 'Motorista'),
        ('004', '2021-07-01', 1500, 'Auxiliar');

    INSERT INTO
        employee (CPF, name, surname, age, sons, contract)
    VALUES
        (12345678900, 'José', 'da Silva', 34, 3, 1),
        (98765432100, 'Ana' , 'Moura'   , 18, 1, 4),
        (12312312300, 'João', 'da Silva', 43, 2, 2),
        (45645645600, 'Bia' , 'Barroso' , 27, 0, 3);

    INSERT INTO
        address (employeeID, uf, city, district, street, number, cep, complement)
    VALUES
        (12312312300, 'RS', 'Porto Alegre', 'Sarandi', 'Rua 1', 10, 12345000, NULL),
        (12345678900, 'RS', 'Porto Alegre', 'Rubem Berta', 'Rua 2', 323, 12345000, NULL),
        (98765432100, 'RS', 'Porto Alegre', 'Moinhos de Vento', 'Av. Farrapos', 410, 12345000, NULL),
        (45645645600, 'RS', 'Porto Alegre', 'Cavalhada', 'Rua 3', 600, 12345000, NULL);

    COMMIT;

END $$

DELIMITER ;

CALL createRegisters();