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
    );