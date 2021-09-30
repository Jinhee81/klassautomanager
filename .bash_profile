# .bash_profile

# Set normal user account home directory for chroot
HOME="/$LOGNAME"
HISTFILE="$HOME/.bash_history"
colors="$HOME/.dircolors"

# Get the aliases and functions
if [ -f /etc/userbashrc ]; then
    . /etc/userbashrc
fi

# User specific environment and startup programs
PATH=$PATH:$HOME/bin
export PATH

LANG=ko_KR.UTF-8
export LANG

unset USERNAME

cd
