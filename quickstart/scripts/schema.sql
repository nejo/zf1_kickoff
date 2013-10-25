CREATE TABLE IF NOT EXISTS guestbook (
    id INT NOT NULL AUTO_INCREMENT,
    comment TEXT NULL,
    created DATETIME NOT NULL,
    PRIMARY KEY (id),
    INDEX `date_index` USING BTREE (created)
);

CREATE TABLE IF NOT EXISTS users (
    id          INT NOT NULL AUTO_INCREMENT,
    username    VARCHAR(50),
    password    VARCHAR(50),
    name        VARCHAR(100) NULL,
    address     VARCHAR(150) NULL,
    PRIMARY KEY (id)
);