docker stop $(docker ps -aq)
docker rm $(docker ps -aq)

docker build -t wackopicko .
