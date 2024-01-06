FROM gustavovinicius/guseventsystem:rabbitmq
# it is very complex to install manually rabbitmq
# example https://www.rabbitmq.com/install-debian.html#apt-quick-start-cloudsmith

# RUN cd /
# RUN mkdir gusrabbitmq

ENTRYPOINT ["tail", "-f", "/dev/null"]