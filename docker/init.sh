#!/bin/bash

cp docker/supervisord.conf /etc/supervisord.conf

supervisord -c /etc/supervisord.conf
