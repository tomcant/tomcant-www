namespace :app do
  namespace :ensure do
    desc 'Ensure correct effective rights by setting a permissive ACL mask.'
    task :'acl-mask' do
      next unless any? :file_permissions_paths

      on roles fetch(:file_permissions_roles) do
        paths = absolute_writable_paths
        execute :setfacl, '-Rm m::rwx', *paths, raise_on_non_zero_exit: false
        execute :setfacl, '-dRm m::rwx', *paths, raise_on_non_zero_exit: false
      end
    end

    desc 'Ensure the latest version of the parameters file is in the release path.'
    task :parameters do
      on roles(:app) do
        directory = File.join(release_path, fetch(:app_config_path))
        execute :cp, "#{directory}/parameters.yml.dist", "#{directory}/parameters.yml"
      end
    end
  end
end
