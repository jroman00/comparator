.DEFAULT_GOAL := help

##  help (default):    Show the help docs
.PHONY: help
help:
	@echo "Options:"
	@sed -n 's|^##||p' ${PWD}/Makefile

##  init:              Initialize the application
.PHONY: init
build:
	docker build -t comparator:latest .
	docker run --rm --mount type=bind,source="$(pwd)",target=/app comparator:latest composer install

##  shell:             Start a shell session in a new container
.PHONY: shell
shell:
	docker run --rm -it --mount type=bind,source="$(pwd)",target=/app comparator:latest /bin/bash

##  lint:              Run the lint suite
.PHONY: lint
lint:
	docker run --rm --mount type=bind,source="$(pwd)",target=/app comparator:latest composer lint

##  test:              Run the test suite
.PHONY: test
test:
	docker run --rm --mount type=bind,source="$PWD",target=/app comparator:latest composer test
