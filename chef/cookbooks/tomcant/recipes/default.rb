include_recipe 'tomcant::apt'
include_recipe 'fb_apt'

%w{htop git vim}.each do |package|
  package package do
    action :install
  end
end

include_recipe 'tomcant::nginx'
include_recipe 'tomcant::php'
include_recipe 'tomcant::app'
