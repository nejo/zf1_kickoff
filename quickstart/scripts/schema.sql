CREATE TABLE IF NOT EXISTS guestbook (
    id              INT NOT NULL AUTO_INCREMENT,
    user_id         INT NULL,
    comment         TEXT NULL,
    created         DATETIME NOT NULL,
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

CREATE TABLE IF NOT EXISTS channels (
    id          INT NOT NULL AUTO_INCREMENT,
    name        VARCHAR(150),
    user_id     INT NOT NULL,
    PRIMARY KEY (id),
    INDEX `user_index` USING BTREE (user_id)
);

CREATE TABLE IF NOT EXISTS videos (
    id              INT NOT NULL AUTO_INCREMENT,
    title           VARCHAR(150),
    youtube_key     VARCHAR(100),
    user_id         INT NOT NULL,
    PRIMARY KEY (id),
    INDEX `user_index` USING BTREE (user_id)
);

CREATE TABLE IF NOT EXISTS channels_videos (
    channel_id      INT NOT NULL,
    video_id        INT NOT NULL,
    PRIMARY KEY (channel_id, video_id)
);