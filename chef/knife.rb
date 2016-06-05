local_mode true
chef_repo_path File.dirname(__FILE__)

knife[:ssh_attribute] = 'knife_zero.host'
knife[:use_sudo] = true

knife[:before_bootstrap] = 'berks vendor cookbooks'
knife[:before_converge] = 'berks vendor cookbooks'
