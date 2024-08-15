resource "aws_subnet" "public_subnet"{
  vpc_id = aws_vpc.main_vpc.id
  cidr_block = "10.0.10.0/24"
  availability_zone = "eu-north-1a"
  map_public_ip_on_launch = true
  tags = {
	  Name = "public_subnet"
  }
}

resource "aws_subnet" "private_subnet_1" {
  vpc_id = aws_vpc.main_vpc.id
  cidr_block = "10.0.20.0/24"
  availability_zone = "eu-north-1a"
  tags = {
	Name = "public_subnet_1"
  }
}

resource "aws_subnet" "private_subnet_2" {
  vpc_id = aws_vpc.main_vpc.id
  cidr_block = "10.0.30.0/24"
  availability_zone = "eu-north-1b"
  tags = {
	Name = "public_subnet_2"
  }
}

resource "aws_elasticache_subnet_group" "redis_subnet_group" {
  name       = "redis-subnet-group"
  subnet_ids = [aws_subnet.private_subnet_1.id, aws_subnet.private_subnet_2.id]

  tags = {
    Name = "redis-subnet-group"
  }
}

resource "aws_elasticache_subnet_group" "redis_subnet_group" {
  name       = "redis-subnet-group"
  subnet_ids = [aws_subnet.private_subnet_1.id, aws_subnet.private_subnet_2.id]

  tags = {
    Name = "redis-subnet-group"
  }
}
