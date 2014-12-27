set :stage, :staging

# Simple Role Syntax
# ==================
role :app, %w{fidget@web129.webfaction.com}
role :web, %w{fidget@web129.webfaction.com}
role :db,  %w{fidget@web129.webfaction.com}

# Extended Server Syntax
# ======================
# server 'fidget@fidget.webfactional.com', user: 'fidget@web129.webfaction.com', roles: %w{web app db}

# you can set custom ssh options
# it's possible to pass any option but you need to keep in mind that net/ssh understand limited list of options
# you can see them in [net/ssh documentation](http://net-ssh.github.io/net-ssh/classes/Net/SSH.html#method-c-start)
# set it globally
#  set :ssh_options, {
#    keys: %w(~/.ssh/id_rsa),
#    forward_agent: false,
#    auth_methods: %w(password)
#  }

fetch(:default_env).merge!(wp_env: :staging)

