# Boosting your performance with Blackfire

A sample project that accompanies the workshop i held at PHP Serbia 2019 conference.

## Description

Duration: 3h

Requirements: A laptop capable of running docker-compose projects. General knowledge in Automated Testing, PHP frameworks Relational and non-Relational databases.

Description: We aim to dispel the notion that large PHP applications tend to be sluggish, resource-intensive and slow compared to what the likes of Python, Erlang or even Node can do. The issue is not with optimising PHP internals - it's the lack of proper introspection tools and getting them into our every day workflow that counts! In this workshop we will talk about our struggles with whipping PHP Applications into shape, as well as work together on some of the more interesting examples of CPU or IO drain. 

# Setup and Usage

You need to have Docker as well as `docker-compose` installed on your local machine.

1. Edit the `/Docker/.env` file by inserting your own BlackFire credentials and changing the ports if needed.
2. Enter the project's `Docker` folder and execute `./deploy.sh`.
3. Visit `http://localhost:80/`. That's it.

## CLI Usage

If at any time you need to access the PHP container directly you can do so via `docker exec -ti php bash`. The blackfire CLI client is installed by default but not set up. You can start it manually by issuing `blackfire config` and entering your Client credentials.

Catena Media 2019
