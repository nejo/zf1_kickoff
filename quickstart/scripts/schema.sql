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
    salt        VARCHAR(50) NOT NULL,
    role        VARCHAR(50) NOT NULL,
    created     DATETIME NOT NULL,
    name        VARCHAR(100) NULL,
    PRIMARY KEY (id)
);