%w{cli intl curl fpm xml}.each do |package|
  package "php7.0-#{package}" do
    action :install
  end
end

# Install composer
remote_file '/usr/local/bin/composer' do
  source 'http://getcomposer.org/composer.phar'
  mode 0755
  action :create
  not_if { ::File.exist?('/usr/local/bin/composer') }
end
