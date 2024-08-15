# Terraform, Ansible, and WordPress Deployment

## Terraform

Terraform is used to create and manage AWS instances automatically.

### Configuration

1. **Set AWS environment variables:**

    ```bash
    export AWS_ACCESS_KEY_ID="XXXXXXXXXXXX"
    export AWS_SECRET_ACCESS_KEY="XXXXXXXXXXXX"
    ```
2. **Create key pair for EC2 instance:**
```hcl
resource "aws_key_pair" "my_key" {
  key_name   = "terr-key"
  public_key = file("~/.ssh/my_new_key.pub")
}
```

3. **Run Terraform commands:**

    ```bash
    terraform init
    terraform validate
    terraform plan
    terraform apply
    ```

## WordPress

`wp-config.php` is the configuration file for WordPress and should be placed in the WordPress root folder on your server.

## Ansible

Ansible is used for automatic deployment.

### Configuration

- **`ansible.cfg`**: Configuration file for Ansible.
- **`hosts.txt`**: File listing your hosts for deployment.

    Example `hosts.txt`:

    ```ini
    [group1]
    host1_name ansible_host=host1_IpAddr
    host2_name ansible_host=host1_IpAddr
    host3_name ansible_host=host1_IpAddr

    [group2]
    host1_name ansible_host=host1_IpAddr
    host2_name ansible_host=host1_IpAddr
    host3_name ansible_host=host1_IpAddr
    ```

- **`group_vars`**: Directory for host group variables.

    Directory structure:

    ```plaintext
    ├── ansible.cfg
    ├── group_vars
    │   └── your_host_group_name
    ├── hosts.txt
    └── playbook.yml
    ```

### Variables

Create files in `group_vars` with the name of your host groups and define variables:

Example `your_host_group_name` file:

```yaml
---
ansible_user                 : ubuntu
ansible_ssh_private_key_file : /path/to/your/key.pem
Var1                         : XXX
Var2                         : XXX
Var3                         : XXX
```

### Deployment

To start deployment, use:

```bash
ansible-playbook playbook.yml
```
or for more logs deployment:
```bash
ansible-playbook playbook.yml -vvv
```
