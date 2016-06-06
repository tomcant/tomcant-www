# Create deployment user.
user 'deploy' do
  home '/home/deploy'
  manage_home true
  shell '/bin/bash'
end

directory '/home/deploy/.ssh' do
  owner 'deploy'
  group 'deploy'
  mode '0700'
  action :create
end

cookbook_file '/home/deploy/.ssh/authorized_keys' do
  source 'deploy/authorized_keys'
  owner 'deploy'
  group 'deploy'
  mode '0600'
end

# Create application directory.
directory '/srv/app' do
  owner 'deploy'
  group 'deploy'
  mode '0755'
  action :create
  not_if { ::Dir.exist?('/srv/app') }
end
