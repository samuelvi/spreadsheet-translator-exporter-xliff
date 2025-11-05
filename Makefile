
.PHONY: install update rector rector-dry-run test test-coverage help

help: ## Show this help message
	@echo 'Usage: make [target]'
	@echo ''
	@echo 'Available targets:'
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-20s\033[0m %s\n", $$1, $$2}'

install: ## Install composer dependencies
	composer install

update: ## Update composer dependencies
	composer update

rector: ## Run Rector to apply code quality fixes
	vendor/bin/rector process src

rector-dry-run: ## Run Rector in dry-run mode (check only)
	vendor/bin/rector process src --dry-run

test: ## Run PHPUnit tests
	vendor/bin/phpunit

test-coverage: ## Run PHPUnit tests with HTML coverage report
	vendor/bin/phpunit --coverage-html coverage

test-coverage-text: ## Run PHPUnit tests with text coverage report
	vendor/bin/phpunit --coverage-text
