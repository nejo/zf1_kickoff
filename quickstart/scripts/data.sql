REPLACE INTO guestbook
    (email, comment, created)
VALUES
(
    'ralph.schindler@zend.com',
    'Hello! Hope you enjoy this sample zf application!',
    NOW()
),
(
    'foo@bar.com',
    'Baz baz baz, baz baz Baz baz baz - baz baz baz.',
    NOW()
);

REPLACE INTO users
    (username, password, name)
    VALUES
    (
        'admin',
        SHA1('adminSFGHS6589569yERUERuERURUsdfURER6UBRy'),
        'SFGHS6589569yERUERuERURUsdfURER6UBRy',
        'administrator',
        NOW(),
        'Administrator Name'
    );