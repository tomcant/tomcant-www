# Tom Cant personal website

## Infrastructure

Provision a server with Chef/Knife:
```
knife zero bootstrap HOST -E prod -r 'tomcant'
```

# Deployment

Deploy the application with Capistrano:
```
bundle exec cap production deploy
```
