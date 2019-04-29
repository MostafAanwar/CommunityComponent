FROM php:7.2-apache
COPY . /c/Users/fancypixel/Desktop/CommunityComponent/CommunityComponent
WORKDIR /c/Users/fancypixel/Desktop/CommunityComponent/CommunityComponent
CMD [ "php", "./index.php" ]
EXPOSE 8080

