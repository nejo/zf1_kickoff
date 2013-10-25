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
    (username, password, name, address)
VALUES
    ('admin', SHA1('admin'), 'Administrator', '');