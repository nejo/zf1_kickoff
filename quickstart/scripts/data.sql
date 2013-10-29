REPLACE INTO guestbook
    (user_id, comment, created)
VALUES
(
    1,
    'Hello! Hope you enjoy this sample zf application!',
    NOW()
),
(
    1,
    'Baz baz baz, baz baz Baz baz baz - baz baz baz.',
    NOW()
);

REPLACE INTO users
    (id, username, password, salt, role, created, name)
    VALUES
    (
        1,
        'admin',
        SHA1('adminSFGHS6589569yERUERuERURUsdfURER6UBRy'),
        'SFGHS6589569yERUERuERURUsdfURER6UBRy',
        'administrator',
        NOW(),
        'Administrator Name'
    ),
    (
        2,
        'user',
        SHA1('userj56jkb46j7b56jb475h8b4578bjk5b8ljk45hkhkg'),
        'j56jkb46j7b56jb475h8b4578bjk5b8ljk45hkhkg',
        'user',
        NOW(),
        'User Name'
    );

REPLACE INTO channels
    (id, name, user_id)
VALUES
    (1, 'nature', 1),
    (2, 'sports', 1),
    (3, 'sports', 2),
    (4, 'music', 2),
    (5, 'dance', 2);

REPLACE INTO videos
    (id, title, youtube_key, user_id)
VALUES
    (1, 'niagara falls', 'yuyu', 1),
    (2, 'rainbow', 'yuyu link', 1),
    (3, 'ac dc 2012 tour', 'yuyu', 2);

REPLACE INTO channels_videos
    (channel_id, video_id)
VALUES
    (1, 1), (1, 2), (4, 3), (5, 3);