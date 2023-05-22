Download Docker onto your system, if it is not already installed, by going to their official Website https://docker.com

1. Make sure docker is successfully installed by running this command onto your terminal:

	docker version

This command shows you the dokcer version you have on your system and a bunch of other information. If it gives an error, you probably have not installed it correctly.

2. Login to your docker hub by running the command:
	
	docker login

3. Start your docker desktop application.

Note:

	You can do step 2 and 3 interchangeably.

4. Make sure you keep all the files in a single directory with no sub directories. After that go to the directory on your terminal (where you have kept all these files) and run the command:

	docker compose build

This will build all the required services to run the docker containers.

5. Then run the command:
	
	docker compose up -d

This command is used to make all the containers within the docker-compose.yml file communicate with each other and pull all the necessary images onto your docker hub.

5a. (Optional)
	
	If you want to check which containers  are currently running on your docker, run the command:

		docker ps
		or
		docker ps -a
5b. View your output on your browser:
	- Go to your browser
	- Type in localhost:8000 onto your search bar (at the top) and run it


6. To stop the communication between the containers and remove the container run the command:

	docker compose down

