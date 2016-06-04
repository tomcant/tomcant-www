# Install nginx.
package 'nginx'

# Define nginx service.
service 'nginx' do
  supports :status => true, :restart => true, :reload => true
end
