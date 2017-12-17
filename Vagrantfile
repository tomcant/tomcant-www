# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box = 'debian/jessie64'
  config.vm.hostname = 'tomcant'
  config.vm.network 'private_network', ip: '192.168.66.10'
  config.vm.synced_folder './app', '/srv/app', type: 'nfs', mount_options: ['rw', 'vers=3', 'tcp', 'fsc']

  # VirtualBox configuration.
  config.vm.provider 'virtualbox' do |vb|
    vb.cpus = 1
    vb.memory = 512
    vb.customize ['modifyvm', :id, '--natdnshostresolver1', 'on']
    vb.customize ['modifyvm', :id, '--natdnsproxy1', 'on']
  end

  # Enable provisioning with Chef Zero.
  Dir.mkdir('/tmp/nodes') unless Dir.exists?('/tmp/nodes')

  config.berkshelf.enabled = true
  config.berkshelf.berksfile_path = 'chef/Berksfile'

  config.vm.provision 'chef_zero' do |chef|
    chef.environment = 'dev'
    chef.environments_path = 'chef/environments'
    chef.cookbooks_path = 'chef/cookbooks'
    chef.nodes_path = '/tmp/nodes'
    chef.run_list = ['tomcant']
    chef.synced_folder_type = 'nfs'
  end
end
