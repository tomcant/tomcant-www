# Personal website

## Infrastructure

Provision a server with Chef and Knife Zero:
```
chef gem install knife-zero
cd /path/to/repo/chef
knife zero bootstrap [USER@]HOST[ -i /path/to/key] -E prod -r 'tomcant'
```

# Deployment

Deploy the application with Capistrano:
```
cd /path/to/repo/deploy
bundle exec cap production deploy
```
