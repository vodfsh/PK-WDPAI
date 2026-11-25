INSERT INTO users (username, email, password_hash, full_name)
VALUES
    ('anna.nowak', 'anna@example.com', '$2y$10$demo', 'Anna Nowak'),
    ('jan.kowalski', 'jan@example.com', '$2y$10$demo', 'Jan Kowalski');

INSERT INTO projects (user_id, name, description, status)
VALUES
    (
        (SELECT id FROM users WHERE email = 'anna@example.com'),
        'Platforma kursowa',
        'Aplikacja do publikowania materiałów i śledzenia postępów studentów.',
        'active'
    ),
    (
        (SELECT id FROM users WHERE email = 'jan@example.com'),
        'System rezerwacji sal',
        'Kalendarz dostępności oraz rezerwacje laboratoriów komputerowych.',
        'planned'
    ),
    (
        (SELECT id FROM users WHERE email = 'anna@example.com'),
        'Panel wyników',
        'Prosty dashboard prezentujący wyniki zaliczeń.',
        'completed'
    );
