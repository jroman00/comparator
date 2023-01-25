
## Build the Application

```bash
docker build -t comparator:latest .

docker run --rm --mount type=bind,source="$PWD",target=/app comparator:latest composer install
```

## Run the Lint Suite

```bash
docker run --rm --mount type=bind,source="$PWD",target=/app comparator:latest composer lint
```


## Run the Test Suite

```bash
docker run --rm --mount type=bind,source="$PWD",target=/app comparator:latest composer test
```

## Run Shell

```bash
docker run --rm -it --mount type=bind,source="$PWD",target=/app comparator:latest /bin/bash
```
