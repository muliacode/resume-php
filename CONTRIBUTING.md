# Contributing to Resume-PHP

Thank you for considering contributing to Resume-PHP! This document outlines the process for contributing to the project and how to report issues.

## Code of Conduct

By participating in this project, you agree to abide by our Code of Conduct. Please be respectful and considerate of others when contributing to the project.

## How to Contribute

### Reporting Bugs

If you find a bug in the library, please create an issue on GitHub with the following information:

1. A clear, descriptive title
2. A detailed description of the issue
3. Steps to reproduce the bug
4. Expected behavior
5. Actual behavior
6. Any relevant code snippets or error messages
7. Your environment (PHP version, operating system, etc.)

### Suggesting Enhancements

We welcome suggestions for enhancements to the library. To suggest an enhancement:

1. Create an issue on GitHub with a clear, descriptive title
2. Provide a detailed description of the enhancement
3. Explain why this enhancement would be useful to most users
4. If possible, provide examples of how the enhancement would work

### Pull Requests

We actively welcome pull requests:

1. Fork the repository
2. Create a new branch for your feature or bugfix (`git checkout -b feature/your-feature-name` or `git checkout -b fix/your-bugfix-name`)
3. Make your changes
4. Add or update tests as necessary
5. Ensure all tests pass by running `composer test`
6. Make sure your code follows the project's coding standards by running `composer format`
7. Commit your changes with a clear, descriptive commit message
8. Push your branch to your fork
9. Submit a pull request to the main repository

#### Pull Request Guidelines

- Keep your changes focused. If you're fixing a bug, only include the bugfix. If you want to add a feature, don't include unrelated changes.
- Update the documentation if necessary.
- Add tests for new features or bugfixes.
- Follow the existing code style.
- Make sure all tests pass before submitting your pull request.

## Development Setup

1. Clone the repository
2. Install dependencies with Composer: `composer install`
3. Run tests: `composer test`

## Coding Standards

This project follows PSR-12 coding standards. You can check your code with:

```bash
composer test:lint
```

And automatically fix style issues with:

```bash
composer lint
```

## Testing

Please ensure all tests pass before submitting a pull request:

```bash
composer test
```

If you're adding new functionality, please add tests for it.

## Documentation

If you're adding new features or making significant changes, please update the documentation accordingly.

## Questions?

If you have any questions about contributing, please open an issue and we'll be happy to help.

Thank you for contributing to Resume-PHP!
