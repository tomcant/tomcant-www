# Personal website

## Infrastructure

Provision a server with Chef/Knife:
```
cd /path/to/repo/chef && knife zero bootstrap HOST -E prod -r 'tomcant'
```

# Deployment

Deploy the application with Capistrano:
```
cd /path/to/repo/deploy && bundle exec cap production deploy
```
