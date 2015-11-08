

echo "deploying theme"
rsync -azP --delete --exclude-from 'exclude-list.txt' ../ fidget@fidget.webfactional.com:webapps/a_traveller/wp-content/themes/travellers/
