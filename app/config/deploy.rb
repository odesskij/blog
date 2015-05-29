default_run_options[:pty] = true

set :use_sudo,          false
set :application,       "capifony"
set :user,              "capifony"
set :domain,            "capifony.alpha.branderstudio.com"
set :deploy_to,         "/home/capifony/www"
set :app_path,          "app"
set :repository,        "https://github.com/odesskij/blog.git"
set :scm,               :git
set :shared_files,      ["app/config/parameters.yml"]
set :model_manager,     "doctrine"

role :web,        domain
role :app,        domain, :primary => true

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL