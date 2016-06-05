# Install nginx.
package 'nginx'

# Define nginx service.
service 'nginx' do
  supports :status => true, :restart => true, :reload => true
end

cookbook_file '/etc/nginx/nginx.conf' do
  source 'nginx/nginx.conf'
  notifies :reload, 'service[nginx]'
end

file '/etc/nginx/conf.d/default.conf' do
  action :nothing
  subscribes :delete, 'package[nginx]'
end

cookbook_file '/etc/nginx/conf.d/tomcant.vhost' do
  source "nginx/conf.d/tomcant.#{node.chef_environment}.vhost"
  notifies :reload, 'service[nginx]'
end
