# Docker Command
.PHONY: up
up:
	@docker compose up -d

.PHONY: down
down:
	@docker compose down

.PHONY: test
test:
	@docker compose exec app ./vendor/bin/phpunit tests/
