#!/bin/bash
cp /var/www/aethergrid.org/waitlist.csv ./;
bundle exec jekyll build -d /var/www/aethergrid.org;
cp ./waitlist.csv /var/www/aethergrid.org/waitlist.csv;
