# Flight Price calculator

In order to run the environment follow the steps :)

1. Startup the containers.
This will take care to download the images and install the dependencies which are not included in the zip (vendor, node_modules) 

```sh
make start
```

Follow the logs to understand when the bootstrap is complete.

```sh
make logs
```

2. Run the database migrations:

```sh
make migrate-db
```

3. Now you should be able to navigate the app on [localhost](http://localhost) :)

4. To stop the execution:
```sh
make stop
```
---
Links:
-
Frontend: http://localhost

API: http://localhost:8080

---