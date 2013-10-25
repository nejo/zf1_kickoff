CREATE TABLE IF NOT EXISTS guestbook (
    id INT NOT NULL AUTO_INCREMENT,
    comment TEXT NULL,
    created DATETIME NOT NULL,
    PRIMARY KEY (id),
    INDEX `date_index` USING BTREE (created)
);