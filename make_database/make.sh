./clean.sh
mysql -h "128.143.69.210" -u ns9wr -pupsorn --init-command="use ns9wr_qanat;" < insert_all_data.sql
# mysql -h "128.143.69.210" -u ns9wr -pupsorn --init-command="use ns9wr_qanat;"
