FROM gustavovinicius/guskafka

RUN apt update

RUN apt install curl -y

RUN apt install nano

WORKDIR /var/www/html/kafka

# RUN curl -O https://dlcdn.apache.org/kafka/3.5.0/kafka_2.13-3.5.0.tgz

# RUN tar -xzf kafka_2.13-3.5.0.tgz

# RUN apt install openjdk-11-jdk -y

# RUN java --version

ENTRYPOINT ["tail", "-f", "/dev/null"]