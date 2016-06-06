# config valid only for current version of Capistrano
lock '3.4.0'

set :application, 'tomcant'
set :repo_url, 'https://bitbucket.org/tomcant/tomcant.git'
set :repo_tree, 'app'
set :branch, '3.x'
set :deploy_to, '/srv/app/tomcant'
set :permission_method, :acl
set :file_permissions_users, ['www-data']
set :file_permissions_paths, [fetch(:var_path), fetch(:log_path)]
set :composer_install_flags, '--no-dev --no-interaction --optimize-autoloader'

# Stage agnostic tasks.
before 'symfony:set_permissions', 'app:ensure:acl-mask'
after 'deploy:updating', 'app:ensure:parameters'
