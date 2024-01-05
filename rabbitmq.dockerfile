FROM ubuntu:jammy
# it is very complex to install manually rabbitmq
# example https://www.rabbitmq.com/install-debian.html#apt-quick-start-cloudsmith
ENTRYPOINT ["tail", "-f", "/dev/null"]