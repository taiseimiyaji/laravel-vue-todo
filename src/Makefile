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

.PHONY: phpdoc
phpdoc:
	docker run \
		--rm \
		-v $(pwd):/data phpdoc/phpdoc \
		-d ./src \
		-t ./phpDocumentor \
		--template="clean" \
		--setting=graphs.enabled=true

# Make doxygen
.PHONY: doxygen
doxygen:
	docker run \
		--rm \
		-v \
		"${PWD}":/src \
		hytssk/doxygen \
		Doxyfile
